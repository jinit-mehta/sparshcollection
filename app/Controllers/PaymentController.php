<?php

namespace App\Controllers;

use App\Models\Carts;
use App\Models\OrderModel;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
// require_once ROOTPATH . 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

class PaymentController extends BaseController
{
    private $razorpayKey;
    private $razorpaySecret;

    public function __construct()
    {
        // Fetch Razorpay credentials from .env
        $this->razorpayKey = env('RAZORPAY_KEY');
        $this->razorpaySecret = env('RAZORPAY_SECRET');
        // $this->razorpayKey = env('RAZORPAY_KEY_TEST');
        // $this->razorpaySecret = env('RAZORPAY_SECRET_TEST');
        
        

        if (empty($this->razorpayKey) || empty($this->razorpaySecret)) {
            log_message('error', 'Razorpay API credentials are missing in .env file.');
            throw new \RuntimeException('Razorpay API credentials are missing.');
        }
    }

public function initiateRazorpayPayment()
{
    // Log the raw input for debugging
    $rawInput = $this->request->getBody();
    log_message('debug', 'Raw Input: ' . $rawInput);

    // Parse JSON data
    $json = $this->request->getJSON();

    if ($json === null) {
        log_message('error', 'Failed to parse JSON data. Raw Input: ' . $rawInput);
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid JSON data received.'
        ]);
    }

    // Validate required fields
    $requiredFields = ['first_name', 'last_name', 'email', 'phone_number', 'totalAmount', 'color'];
    foreach ($requiredFields as $field) {
        if (!isset($json->$field) || empty($json->$field)) {
            log_message('error', 'Missing or empty field: ' . $field);
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Required field ' . $field . ' is missing or empty.'
            ]);
        }
    }

    // Extract and validate total amount
    $totalAmount = $json->totalAmount;
    
    // Convert amount to proper numeric format
    $totalAmount = str_replace(['₹', 'Rs', ' ', ','], '', $totalAmount);
    $totalAmount = filter_var($totalAmount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    
    if (!is_numeric($totalAmount)) {
        log_message('error', 'Invalid Total Amount format: ' . $json->totalAmount);
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid total amount format. Please enter a valid numeric amount.'
        ]);
    }

    $totalAmount = (float)$totalAmount;
    
    if ($totalAmount <= 0) {
        log_message('error', 'Total Amount must be greater than 0: ' . $totalAmount);
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Total Amount must be greater than 0.'
        ]);
    }

    // Extract other values from JSON
    $firstName = $json->first_name;
    $lastName = $json->last_name;
    $email = $json->email;
    $phoneNumber = $json->phone_number;
    $country = $json->country ?? null;
    $state = $json->state ?? null;
    $addressLine1 = $json->address_line_1 ?? null;
    $addressLine2 = $json->address_line_2 ?? null;
    $city = $json->city ?? null;
    $postalCode = $json->postal_code ?? null;
    $color = $json->color;
    $length_bracelet = $json->length_bracelet ?? '';

    // Store input data in a session
    $checkoutData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone_number' => $phoneNumber,
        'country' => $country,
        'state' => $state,
        'address_line_1' => $addressLine1,
        'address_line_2' => $addressLine2,
        'city' => $city,
        'postal_code' => $postalCode,
        'color' => $color,
        'length_bracelet' => $length_bracelet,
        'totalAmount' => $totalAmount,
    ];

    $session = \Config\Services::session();
    $session->set('checkout_data', $checkoutData);

    // Set up Razorpay payment
    $api = new Api($this->razorpayKey, $this->razorpaySecret);

    $orderData = [
        'receipt' => 'order_rcptid_' . time(),
        'amount' => round($totalAmount * 100), // Convert to paise and round to avoid decimals
        'currency' => 'INR',
        'payment_capture' => 1 // Auto capture payment
    ];

    try {
        $razorpayOrder = $api->order->create($orderData);
        log_message('debug', 'Razorpay Order Created: ' . print_r($razorpayOrder, true));

        return $this->response->setJSON([
            'status' => 'success',
            'key' => $this->razorpayKey,
            'amount' => $orderData['amount'],
            'currency' => $orderData['currency'],
            'order_id' => $razorpayOrder['id'],
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'contact' => $phoneNumber,
            'actual_amount' => $totalAmount
        ]);
    } catch (\Exception $e) {
        log_message('error', 'Razorpay Order Creation Failed: ' . $e->getMessage());
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Payment initiation failed: ' . $e->getMessage()
        ]);
    }
}

   public function razorpayPaymentSuccess()
{
    $session = \Config\Services::session();
    $customer_id = $session->get('customer_id');

    if (!$customer_id) {
        return redirect()->to('/customer/login');
    }

    // Retrieve stored checkout data from session
    $checkoutData = $session->get('checkout_data');
    if (empty($checkoutData)) {
        log_message('error', 'Checkout data not found in session');
        return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Session data missing.');
    }

    $cartModel = new Carts();
    $cartProducts = $cartModel->getCartProducts($customer_id);

    // Calculate total from cart products
    $totalPrice = 0;
    $productName = "";
    $productId = "";
    
    foreach ($cartProducts as $cartProduct) {
        $productName .= $cartProduct['product_name'] . ', ';
        $productId .= $cartProduct['product_id'] . ', ';
        $totalPrice += $cartProduct['product_price'] * $cartProduct['quantity'];
    }

    // Remove trailing comma and space
    $productName = rtrim($productName, ', ');
    $productId = rtrim($productId, ', ');

    // Verify amount matches between cart and payment
    if (abs($totalPrice - $checkoutData['totalAmount']) > 0.01) {
        log_message('error', 'Amount mismatch: Cart='.$totalPrice.' Session='.$checkoutData['totalAmount']);
        return redirect()->to('FrontEnd/payment/payment_failure.php')
            ->with('error', 'Payment amount does not match cart total');
    }

    // Retrieve Razorpay payment details
    $razorpayPaymentId = $this->request->getGet('payment_id');
    $razorpayOrderId = $this->request->getGet('order_id');
    $razorpaySignature = $this->request->getGet('signature');

    // Verify the payment signature
    $api = new Api($this->razorpayKey, $this->razorpaySecret);
    $attributes = [
        'razorpay_order_id' => $razorpayOrderId,
        'razorpay_payment_id' => $razorpayPaymentId,
        'razorpay_signature' => $razorpaySignature,
    ];

    try {
        $api->utility->verifyPaymentSignature($attributes);
    } catch (\Exception $e) {
        log_message('error', 'Payment verification failed: ' . $e->getMessage());
        return redirect()->to('FrontEnd/payment/payment_failure.php')
            ->with('error', 'Payment verification failed: ' . $e->getMessage());
    }

    // Generate Invoice using the calculated totalPrice
    $invoicePath = $this->generateInvoice(
        $razorpayOrderId,
        $session->get('customer_name'),
        $checkoutData['email'],
        $checkoutData['address_line_1'] . ', ' . $checkoutData['city'] . ', ' . 
        $checkoutData['state'] . ', ' . $checkoutData['postal_code'] . ', ' . $checkoutData['country'],
        $productName,
        $totalPrice, // Use the calculated amount
        'Razorpay'
    );

    if (!$invoicePath) {
        log_message('error', 'Invoice generation failed for order ID: ' . $razorpayOrderId);
        return redirect()->to('FrontEnd/payment/payment_failure.php')
            ->with('error', 'Invoice generation failed.');
    }

    // Prepare order data
    $orderModel = new OrderModel();
    $data = [
        'customer_id' => $customer_id,
        'customer_name' => $session->get('customer_name'),
        'product_id' => $productId,
        'product_name' => $productName,
        'total_amount' => $totalPrice, // Store the calculated amount
        'payment_id' => $razorpayPaymentId,
        'payer_id' => $customer_id,
        'status' => 'Successful',
        'payment_method' => 'Razorpay',
        'invoice_path' => $invoicePath,
        'first_name' => $checkoutData['first_name'],
        'last_name' => $checkoutData['last_name'],
        'email' => $checkoutData['email'],
        'phone_number' => $checkoutData['phone_number'],
        'address_line_1' => $checkoutData['address_line_1'],
        'address_line_2' => $checkoutData['address_line_2'],
        'city' => $checkoutData['city'],
        'state' => $checkoutData['state'],
        'postal_code' => $checkoutData['postal_code'],
        'country' => $checkoutData['country'],
        'color' => $checkoutData['color'],
        'length_bracelet' => $checkoutData['length_bracelet'] ?? '',
    ];

    // Insert order data into the database
    if (!$orderModel->insert($data)) {
        log_message('error', 'Failed to save order to database');
        return redirect()->to('FrontEnd/payment/payment_failure.php')
            ->with('error', 'Failed to save order details.');
    }

    // Clear the cart
    if (!$cartModel->deleteCartItemsByCustomerId($customer_id)) {
        log_message('error', 'Failed to clear cart for customer: ' . $customer_id);
    }

    // Send confirmation email
    $this->sendOrderConfirmationEmail(
        $checkoutData['email'],
        $session->get('customer_name'),
        $productName,
        $totalPrice,
        $razorpayOrderId,
        $invoicePath
    );

    // Prepare success response data
    $responseData = [
        'payment_id' => $razorpayPaymentId,
        'customer_name' => $session->get('customer_name'),
        'total_amount' => $totalPrice,
        'payment_method' => 'Razorpay',
        'status' => 'Successful',
        'invoice_path' => $invoicePath,
        'order_id' => $razorpayOrderId,
        'product_name' => $productName
    ];

    return view('FrontEnd/payment/payment_success.php', $responseData);
}

    public function handleCashOnDelivery()
    {
        $session = \Config\Services::session();
        $customer_id = $session->get('customer_id');

        if (!$customer_id) {
            log_message('error', 'Customer not logged in.');
            return redirect()->to('/customer/login'); // Redirect to login if not authenticated
        }

        // Retrieve stored checkout data from session
        $checkoutData = $session->get('checkout_data');

        // Debug: Check the contents of $checkoutData
        log_message('debug', 'Checkout Data: ' . print_r($checkoutData, true));

        // Check if $checkoutData is null or empty
        if (empty($checkoutData)) {
            log_message('error', 'Checkout data is null or empty.');
            return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Checkout data is missing.');
        }

        $cartModel = new Carts();
        $cartProducts = $cartModel->getCartProducts($customer_id);

        // Prepare product details
        $productName = "";
        $productId = "";
        $totalPrice = 0;
        foreach ($cartProducts as $cartProduct) {
            $productName .= $cartProduct['product_name'] . ', ';
            $productId .= $cartProduct['product_id'] . ', ';
            $totalPrice += $cartProduct['product_price'] * $cartProduct['quantity'];
        }

        // Remove trailing comma and space
        $productName = rtrim($productName, ', ');
        $productId = rtrim($productId, ', ');

        // Generate Invoice
        $invoicePath = $this->generateInvoice(
            'COD_' . time(),
            $session->get('customer_name'),
            $checkoutData['email'] ?? '', // Use null coalescing operator to avoid error
            ($checkoutData['address_line_1'] ?? '') . ', ' .
            ($checkoutData['city'] ?? '') . ', ' .
            ($checkoutData['state'] ?? '') . ', ' .
            ($checkoutData['postal_code'] ?? '') . ', ' .
            ($checkoutData['country'] ?? ''),
            $productName,
            $totalPrice,
            'Cash on Delivery'
        );

        if (!$invoicePath) {
            log_message('error', 'Invoice generation failed for COD order.');
            return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Invoice generation failed.');
        }

        // Prepare order data
        $orderModel = new OrderModel();
        $data = [
            'customer_id' => $customer_id,
            'customer_name' => $session->get('customer_name'),
            'product_id' => $productId,
            'product_name' => $productName,
            'total_amount' => $totalPrice,
            'payment_id' => 'COD',
            'payer_id' => $customer_id,
            'status' => 'Pending',
            'payment_method' => 'Cash on Delivery',
            'invoice_path' => $invoicePath,
            'first_name' => $checkoutData['first_name'] ?? '',
            'last_name' => $checkoutData['last_name'] ?? '',
            'email' => $checkoutData['email'] ?? '',
            'phone_number' => $checkoutData['phone_number'] ?? '',
            'address_line_1' => $checkoutData['address_line_1'] ?? '',
            'address_line_2' => $checkoutData['address_line_2'] ?? '',
            'city' => $checkoutData['city'] ?? '',
            'state' => $checkoutData['state'] ?? '',
            'postal_code' => $checkoutData['postal_code'] ?? '',
            'country' => $checkoutData['country'] ?? '',
            'color' => $checkoutData['color'] ?? '',
        ];

        // Insert order data into the database
        if (!$orderModel->insert($data)) {
            log_message('error', 'Failed to insert order data into the database.');
            return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Failed to save order data.');
        }

        // Clear the cart after successful order placement
        if (!$cartModel->deleteCartItemsByCustomerId($customer_id)) {
            log_message('error', 'Failed to clear cart items for customer ID: ' . $customer_id);
        }

        // Send email with invoice
        if (
            !$this->sendOrderConfirmationEmail(
                $checkoutData['email'] ?? '',
                $session->get('customer_name'),
                $productName,
                $totalPrice,
                'COD_' . time(),
                $invoicePath
            )
        ) {
            log_message('error', 'Failed to send order confirmation email.');
        }

        // Pass data to the view
        $viewData = [
            'payment_id' => 'COD_' . time(), // Unique ID for COD order
            'customer_name' => $session->get('customer_name'),
            'total_amount' => $totalPrice,
            'payment_method' => 'Cash on Delivery', // Set payment method
            'status' => 'Pending', // Set status for COD
            'invoice_path' => $invoicePath, // Set invoice path
        ];

        // Load the payment success view with data
        return view('FrontEnd/payment/payment_success', $viewData);
    }

   private function generateInvoice($orderId, $customerName, $customerEmail, $customerAddress, $productName, $totalAmount, $paymentMethod)
{
    // Validate input amounts
    if (!is_numeric($totalAmount)) { // Fixed missing closing parenthesis here
        log_message('error', 'Invalid total amount provided for invoice: ' . $totalAmount);
        return false;
    }

    // Format amount to 2 decimal places
    $formattedAmount = number_format((float)$totalAmount, 2, '.', '');

    // Load the dompdf library
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->set_option('isRemoteEnabled', true);

    // Set font directory
    $fontDir = WRITEPATH . 'fonts/';
    if (!is_dir($fontDir)) {
        mkdir($fontDir, 0777, true);
    }

    // Logo path
    $logoPath = base_url('assets/images/upload/logo.webp');

    // Invoice HTML content with proper amount display
    $html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        @font-face {
            font-family: "NotoSans";
            src: url("' . base_url('assets/fonts/NotoSans-Regular.ttf') . '") format("truetype");
        }
        body {
            font-family: "NotoSans", Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header img {
            max-width: 150px;
            margin-bottom: 15px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 28px;
            color: #273B79;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .invoice-details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #273B79;
            color: #fff;
            font-weight: 600;
        }
        .invoice-table td {
            background-color: #f9f9f9;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        .invoice-footer p {
            margin: 5px 0;
        }
        .amount-cell {
            text-align: right;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <img src="' . $logoPath . '" alt="Company Logo">
            <h1>Tax Invoice</h1>
            <p>Invoice Number: ' . $orderId . '</p>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Date:</strong> ' . date('d F Y, h:i A') . '</p>
            <p><strong>Customer Name:</strong> ' . $customerName . '</p>
            <p><strong>Email:</strong> ' . $customerEmail . '</p>
            <p><strong>Address:</strong> ' . $customerAddress . '</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . htmlspecialchars($productName) . '</td>
                    <td>1</td>
                    <td class="amount-cell">₹' . $formattedAmount . '</td>
                    <td class="amount-cell">₹' . $formattedAmount . '</td>
                </tr>
            </tbody>
        </table>
        <div class="invoice-footer">
            <p><strong>Payment Method:</strong> ' . htmlspecialchars($paymentMethod) . '</p>
            <p><strong>Grand Total:</strong> ₹' . $formattedAmount . '</p>
            <p>Thank you for your purchase!</p>
        </div>
    </div>
</body>
</html>
';

    // Load HTML content into dompdf
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Define the invoice directory
    $invoiceDir = WRITEPATH . 'Invoices/';
    if (!is_dir($invoiceDir)) {
        mkdir($invoiceDir, 0777, true);
    }

    $invoiceFileName = 'invoice_' . $orderId . '.pdf';
    $invoicePath = $invoiceDir . $invoiceFileName;

    // Save the PDF
    file_put_contents($invoicePath, $dompdf->output());

    // Verify the file was created
    if (!file_exists($invoicePath)) {
        log_message('error', 'Failed to save invoice file at: ' . $invoicePath);
        return false;
    }

    return 'Invoices/' . $invoiceFileName;
}

    public function downloadInvoice($orderId)
{
    $orderModel = new OrderModel();
    $order = $orderModel->where('payment_id', $orderId)->first();
    
    if (!$order) {
        log_message('error', 'Order not found for payment ID: ' . $orderId);
        return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Invoice not found.');
    }
    
    // Get the invoice path from the order
    $invoicePath = $order['invoice_path'];
    
    // Construct the full path to the invoice file
    $fullPath = WRITEPATH . ltrim($invoicePath, '/');
    
    log_message('debug', 'Full invoice path: ' . $fullPath);
    
    if (!file_exists($fullPath)) {
        log_message('error', 'Invoice file not found at: ' . $fullPath);
        return redirect()->to('FrontEnd/payment/payment_failure.php')->with('error', 'Invoice file not found.');
    }
    
    // Set appropriate headers for PDF download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($fullPath) . '"');
    header('Content-Length: ' . filesize($fullPath));
    
    // Read the file and output it to the browser
    readfile($fullPath);
    exit;
}

    private function sendOrderConfirmationEmail($customerEmail, $customerName, $productName, $totalAmount, $orderId, $invoicePath)
{
    // Load the email service
    $email = \Config\Services::email();

    // Set email configuration
    $config = [
        'protocol' => 'smtp',
        'SMTPHost' => 'smtp.gmail.com',
        'SMTPUser' => 'thesparshcollection@gmail.com', // Replace with your email
        'SMTPPass' => 'usxk pflj fkfg nyqp', // Replace with your email password
        'SMTPPort' => 587,
        'SMTPCrypto' => 'tls',
        'mailType' => 'html',
    ];
    $email->initialize($config);

    // Set email details
    $email->setFrom('thesparshcollection@gmail.com', 'Sparsh Collection'); // Replace with your email
    $email->setTo($customerEmail);
    $email->setSubject('Order Confirmation - Order ID: ' . $orderId);

    // Retrieve checkout data from session
    $session = \Config\Services::session();
    $checkoutData = $session->get('checkout_data');

    // Ensure length_bracelet is set
    $length_bracelet = $checkoutData['length_bracelet'] ?? 'N/A';

    // Email content
    $emailContent = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Order Confirmation</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .email-container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px; }
            .email-header { text-align: center; margin-bottom: 20px; }
            .email-header img { max-width: 150px; }
            .email-body { padding: 20px; background: #fff; border-radius: 10px; }
            .email-footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='email-header'>
                <img src='" . base_url('assets/images/upload/logo.webp') . "' alt='Company Logo'>
            </div>
            <div class='email-body'>
                <h2>Order Confirmation</h2>
                <p>Dear $customerName,</p>
                <p>Thank you for your order with <strong>Sparsh Collection</strong>. Below are the details of your purchase:</p>
                <ul>
                    <li><strong>Order ID:</strong> $orderId</li>
                    <li><strong>Product Name:</strong> $productName</li>
                    <li><strong>Total Amount:</strong> Rs.$totalAmount</li>
                    <li><strong>Length:</strong> $length_bracelet</li> <!-- Add length field -->
                </ul>
                <p>You can view your order details <a href='" . base_url('customer/orders') . "'>here</a>.</p>
                <p>If you have any questions, feel free to contact us at <a href='mailto:thesparshcollection@gmail.com'>thesparshcollection@gmail.com</a>.</p>
                <p>Thank you for shopping with us!</p>
            </div>
            <div class='email-footer'>
                <p>&copy; " . date('Y') . " Sparsh Collection. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $email->setMessage($emailContent);

    // Attach the invoice
    $email->attach(WRITEPATH . $invoicePath);

    // Send the email
    if (!$email->send()) {
        log_message('error', 'Order confirmation email failed to send: ' . $email->printDebugger(['headers']));
    }
}
}

