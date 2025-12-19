<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;
use App\Models\ReviewModel;
use App\Models\CustomersModel;

class Home extends BaseController
{
    public function home()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            // User is logged in
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        $cache = \Config\Services::cache();
        $cache->clean();

        // Check if cached data exists
        if (!$data = $cache->get('home_page_data')) {
            // Data not in cache, fetch from database
            $productModel = new Products();
            $categoryModel = new Categories();

            $data['products'] = $productModel->getFeatureProduct();
            $data['newArrivals'] = $productModel->orderBy('created_at', 'DESC')->limit(4)->findAll();
            $data['latestProducts'] = $productModel->getAllProduct();
            $data['categories'] = $categoryModel->where('status', 1)->findAll(); // Fetch active categories
            // Save data to cache for 1 hour
            $cache->save('home_page_data', $data, 3600);
        }

        return view('FrontEnd/home', $data);
    }
public function allProducts()
{
    // Check if the user is logged in
    $auth = service('auth');
    if ($auth->loggedIn()) {
        $user = $auth->user();
        $data['user'] = $user; // Pass user data to the view if needed
    }

    // Initialize cache
    $cache = \Config\Services::cache();

    // Check if cached data exists
    if (!$data = $cache->get('all_products_data')) {
        // Data not in cache, fetch from database
        $productModel = new Products();
        $categoryModel = new Categories();
        $brandsModel = new Brands();

        $data['brands'] = $brandsModel->findAll();
        $data['categories'] = $categoryModel->findAll();
        $data['products'] = $productModel->getAllProduct(); // Fetch all products without pagination

        // Save data to cache for 1 hour
        $cache->save('all_products_data', $data, 3600);
    }

    // Handle category filter
    $selectedCategory = $this->request->getGet('category');
    if ($selectedCategory) {
        $productModel = new Products();
        $data['products'] = $productModel->getProductsByCategory([$selectedCategory]);
    }

    return view('FrontEnd/allproducts', $data);
}

    public function filterByCategory()
    {
        $selectedCategory = $this->request->getVar('categories'); // Fixed parameter name

        $productModel = new Products();
        $categoryModel = new Categories();
        $brandsModel = new Brands();
        $data['brands'] = $brandsModel->findAll();
        $data['categories'] = $categoryModel->findAll();

        if (empty($selectedCategory)) {
            // No category selected, get all products
            $filteredProducts = $productModel->getAllProduct(); // Fetch all products
        } else {
            // Filter products by the selected category
            $filteredProducts = $productModel->getProductByCategory($selectedCategory); // Fetch filtered products
        }

        return $this->response->setJSON($filteredProducts); // Return filtered products as JSON
    }

    public function single_product($productId)
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        // Initialize models
        $productModel = new Products();
        $reviewModel = new ReviewModel();

        // Fetch product details by ID
        $product = $productModel->getProductById($productId);

        // Handle case where the product is not found
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found.');
        }

        // Fetch reviews for the product
        $reviews = $reviewModel->getProductReviews($product['product_id']);

        // Fetch average rating for the product
        $averageRating = $reviewModel->getAverageRating($product['product_id']);

        // Fetch similar products
        $similarProducts = $productModel->getSimilarProducts($product['category_id'], $productId);

        // Pass product data, reviews, average rating, and similar products to the view
        $data['product'] = $product;
        $data['reviews'] = $reviews;
        $data['averageRating'] = $averageRating['rating'] ?? 0; // Default to 0 if no rating exists
        $data['similarProducts'] = $similarProducts;

        return view('FrontEnd/single_product', $data);
    }

    public function about()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/about', $data ?? []);
    }

    public function contact()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/contact', $data ?? []);
    }

    public function submitContactForm()
    {
        // Validate the form data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'required',
            'message' => 'required|min_length[10]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Get form data
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email'); // Dynamic "from" email
        $phone = $this->request->getPost('phone');
        $message = $this->request->getPost('message');

        // Prepare email content
        $emailContent = "
    <h2>New Contact Form Submission</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    <p><strong>Message:</strong> {$message}</p>
    ";

        // Send email
        $emailService = \Config\Services::email();
        $emailService->setFrom($email, $name); // Dynamic "from" email and name
        $emailService->setTo('thesparshcollection@gmail.com'); // Static "to" email (owner's email)
        $emailService->setSubject('New Contact Form Submission');
        $emailService->setMessage($emailContent);

        if ($emailService->send()) {
            // Email sent successfully
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } else {
            // Email failed to send
            $debugMessage = $emailService->printDebugger(['headers']); // Capture debug information
            log_message('error', 'Email sending failed: ' . $debugMessage); // Log the error
            return redirect()->back()->withInput()->with('error', 'Failed to send your message. Please try again.');
        }
    }

    public function returnPolicy()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/policies/return-policy', $data ?? []);
    }

    public function shippingPolicy()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/policies/shipping-policy', $data ?? []);
    }

    public function jewelleryCare()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/policies/jewellery-care', $data ?? []);
    }

    public function privacyPolicy()
    {
        // Check if the user is logged in
        $auth = service('auth');
        if ($auth->loggedIn()) {
            $user = $auth->user();
            $data['user'] = $user; // Pass user data to the view if needed
        }

        return view('FrontEnd/policies/privacy-policy', $data ?? []);
    }

    public function submitReview()
    {
        $reviewModel = new ReviewModel();
        $productModel = new Products();
        $customerModel = new CustomersModel();

        // Fetch product and customer details
        $product_id = $this->request->getPost('product_id');
        $customer_id = session()->get('customer_id');

        // Debug: Check if customer_id is set in the session
        if (!$customer_id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'You must be logged in to submit a review.']);
        }

        $product = $productModel->find($product_id);
        $customer = $customerModel->find($customer_id);

        // Debug: Check the contents of $customer
        if (!$customer) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Customer not found.']);
        }

        if (!$product) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found.']);
        }

        // Debug: Check if customer_name exists in the $customer array
        if (!isset($customer['customer_name'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Customer data is incomplete.']);
        }

        // Prepare review data
        $data = [
            'product_id' => $product_id,
            'customer_id' => $customer_id,
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
            'images' => '', // Initialize images as empty
        ];

        // Insert the review into the database
        if ($reviewModel->insert($data)) {
            // Get the review ID after insertion
            $review_id = $reviewModel->getInsertID();

            // Create a folder for the review using the review ID
            $folderName = 'review_' . $review_id;
            $uploadPath = ROOTPATH . '/assets/images/reviews/' . $folderName;

            // Create the folder if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Handle multiple image uploads
            $imageFiles = $this->request->getFiles();
            $uploadedImages = [];

            if (!empty($imageFiles['images'])) {
                foreach ($imageFiles['images'] as $image) {
                    if ($image->isValid() && !$image->hasMoved()) {
                        $newName = $image->getRandomName();
                        $image->move($uploadPath, $newName);
                        $uploadedImages[] = $folderName . '/' . $newName; // Store the relative path
                    }
                }
            }

            // Update the review with the image paths
            $reviewModel->update($review_id, ['images' => json_encode($uploadedImages)]);

            // Fetch updated reviews and average rating
            $reviews = $reviewModel->getProductReviews($product_id);
            $averageRating = $reviewModel->getAverageRating($product_id);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Review submitted successfully!',
                'reviews' => $reviews,
                'averageRating' => $averageRating['rating'] ?? 0,
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to submit review. Please try again.']);
        }
    }
    private function handleImageUpload()
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . '/assets/images/reviews/', $newName);
            return $newName;
        }
        return null;
    }
}