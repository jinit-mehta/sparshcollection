<?php

namespace App\Controllers;

use App\Models\adminModel;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\OrderModel;
use App\Models\Products;
use App\Models\Carts;
use App\Models\CustomersModel;
use App\Models\ReviewModel;
use CodeIgniter\RESTful\Controller;
use CodeIgniter\API\Response;
use GuzzleHttp\Client;

class Admin extends BaseController
{
  // ====Copi ai======
  // public function generateProductDescription()
  // {

  //   // Replace with your Copy.ai API key
  //   $apiKey = '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';
  //   // $gpt3Endpoint = 'https://api.openai.com/v1/engines/davinci-codex/completions';
  //   $gpt3Endpoint = 'https://api.openai.com/v1/engines/davinci/completions';
  //   $productName = "men buggy white shirt ";

  //   $client = new Client();
  //   $response = $client->post($gpt3Endpoint, [
  //     'headers' => [
  //       'Content-Type' => 'application/json',
  //       'Authorization' => 'Bearer ' . $apiKey,
  //     ],
  //     'json' => [
  //       'prompt' => 'Generate a product description for ' . $productName,
  //       'max_tokens' => 100,
  //       // Adjust as needed
  //     ],
  //   ]);

  //   $result = json_decode($response->getBody(), true);
  //   print_r($result['choices'][0]['text']);
  //   exit();
  //   // Load a view to display the generated description
  //   return view('product_description', ['description' => $description]);
  // }

public function login()
{
    // Check if the admin is already logged in
    if (session()->get('admin_logged_in')) {
        return redirect()->to('admin/dashboard');
    }

    return view('Admin/login');
}

  public function adminAuth()
{
    $adminModel = new adminModel();
    $Rules = [
        'admin_email' => 'required',
        'admin_password' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
        $admin_email = $this->request->getVar('admin_email');
        $admin_password = $this->request->getVar('admin_password');

        $admin = $adminModel->where('admin_email', $admin_email)
            ->first(); // Use 'first()' to retrieve a single record

        if ($admin && password_verify($admin_password, $admin['admin_password'])) {
            // Authentication successful, store admin data in session
            $adminData = [
                'admin_id' => $admin['admin_id'],
                'admin_logged_in' => true,
                'admin_name' => $admin['admin_name'],
            ];

            session()->set($adminData);
            // Redirect to a protected page or perform any other action
            return redirect()->to('admin/dashboard');
        } else {
            // Authentication failed, redirect back with an error message
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }
    } else {
        // Validation failed, redirect back with validation errors
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}
public function adminLogout()
{
    // Clear the admin session data
    session()->remove('admin_id');
    session()->remove('admin_logged_in');
    session()->remove('admin_name');

    // Optionally, destroy the session
    session()->destroy();

    // Redirect to the login page or any other appropriate page
    return redirect()->to('admin/login');
}
  public function register()
  {
    return view('Admin/register');
  }

  public function register_check()
  {
    $adminModel = new adminModel();
    $rules = [
      'admin_name' => 'required',
      'admin_email' => 'required',
      'admin_password' => 'required',
      'confirm_password' => 'matches[admin_password]',
    ];

    if ($this->validate($rules)) {
      $adminModel = new adminModel();
      $data = [
        'admin_name' => $this->request->getVar('admin_name'),
        'admin_password' => password_hash($this->request->getVar('admin_password'), PASSWORD_DEFAULT),
        'admin_email' => $this->request->getVar('admin_email'),
      ];
      // print_r($data);exit();
      $adminModel->insert($data);
      return redirect()->to('Admin/dashboard');
    } else {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }


 public function dashboard()
{
    $orderModel = new OrderModel();
    $productModel = new Products();
    $customerModel = new CustomersModel();
    $categoryModel = new Categories();
    $reviewModel = new ReviewModel();

    // Total Metrics
    $totalOrders = $orderModel->countAllResults();
    $totalRevenue = $orderModel->selectSum('total_amount')->get()->getRow()->total_amount;
    $totalProducts = $productModel->countAllResults();
    $totalCustomers = $customerModel->countAllResults();

    // Percentage Calculations
    $orderPercentage = $this->calculatePercentage($totalOrders, $orderModel->where('created_at >=', date('Y-m-d', strtotime('-30 days')))->countAllResults());
    $revenuePercentage = $this->calculatePercentage($totalRevenue, $orderModel->where('created_at >=', date('Y-m-d', strtotime('-30 days')))->selectSum('total_amount')->get()->getRow()->total_amount);
    $productPercentage = $this->calculatePercentage($totalProducts, $productModel->where('created_at >=', date('Y-m-d', strtotime('-30 days')))->countAllResults());
    $customerPercentage = $this->calculatePercentage($totalCustomers, $customerModel->where('created_at >=', date('Y-m-d', strtotime('-30 days')))->countAllResults());

    // Recent Orders
    $recentOrders = $orderModel->orderBy('created_at', 'DESC')->limit(5)->findAll();

    // Top Selling Products
    $topProducts = $productModel->select('products.product_name, SUM(carts.quantity) as total_sales, SUM(products.product_price * carts.quantity) as total_revenue')
                                ->join('carts', 'carts.product_id = products.product_id')
                                ->groupBy('products.product_id')
                                ->orderBy('total_sales', 'DESC')
                                ->limit(5)
                                ->findAll();

    // Sales Data for Charts
    $salesData = $orderModel->select('DATE(created_at) as date, COUNT(order_id) as sales')
                            ->where('created_at >=', date('Y-m-d', strtotime('-30 days')))
                            ->groupBy('DATE(created_at)')
                            ->findAll();
    $salesLabels = array_column($salesData, 'date');
    $salesData = array_column($salesData, 'sales');

    // Revenue Data for Charts
    $revenueData = $orderModel->select('DATE(created_at) as date, SUM(total_amount) as revenue')
                              ->where('created_at >=', date('Y-m-d', strtotime('-30 days')))
                              ->groupBy('DATE(created_at)')
                              ->findAll();
    $revenueLabels = array_column($revenueData, 'date');
    $revenueData = array_column($revenueData, 'revenue');

    // Order Status Distribution
    $orderStatusData = $orderModel->select('status, COUNT(order_id) as count')
                                  ->groupBy('status')
                                  ->findAll();
    $orderStatusLabels = array_column($orderStatusData, 'status');
    $orderStatusData = array_column($orderStatusData, 'count');

    // Customer Demographics
    $customerDemographicsData = $customerModel->select('customer_address, COUNT(customer_id) as count')
                                              ->groupBy('customer_address')
                                              ->findAll();
    $customerDemographicsLabels = array_column($customerDemographicsData, 'customer_address');
    $customerDemographicsData = array_column($customerDemographicsData, 'count');

    // Inventory Alerts
    $inventoryAlerts = $productModel->select('product_name, quantity')
                                    ->where('quantity <', 10)
                                    ->findAll();

    // Recent Reviews
    $recentReviews = $reviewModel->select('reviews.*, products.product_name, customers.customer_name')
                                 ->join('products', 'products.product_id = reviews.product_id')
                                 ->join('customers', 'customers.customer_id = reviews.customer_id')
                                 ->orderBy('reviews.created_at', 'DESC')
                                 ->limit(5)
                                 ->findAll();

    $data = [
        'totalOrders' => $totalOrders,
        'orderPercentage' => $orderPercentage,
        'totalRevenue' => $totalRevenue,
        'revenuePercentage' => $revenuePercentage,
        'totalProducts' => $totalProducts,
        'productPercentage' => $productPercentage,
        'totalCustomers' => $totalCustomers,
        'customerPercentage' => $customerPercentage,
        'recentOrders' => $recentOrders,
        'topProducts' => $topProducts,
        'salesLabels' => $salesLabels,
        'salesData' => $salesData,
        'revenueLabels' => $revenueLabels,
        'revenueData' => $revenueData,
        'orderStatusLabels' => $orderStatusLabels,
        'orderStatusData' => $orderStatusData,
        'customerDemographicsLabels' => $customerDemographicsLabels,
        'customerDemographicsData' => $customerDemographicsData,
        'inventoryAlerts' => $inventoryAlerts,
        'recentReviews' => $recentReviews,
    ];

    return view('Admin/dashboard', $data);
}

private function calculatePercentage($current, $previous)
{
    if ($previous == 0) return 0;
    return round((($current - $previous) / $previous) * 100, 2);
}
  // ========== Start Products Controller Function =========//

  public function all_products()
  {
    $productModel = new Products();
    $data['products'] = $productModel->getAllProduct();
    return view('Admin/Product/all_products', $data);
  }

public function check_add_product()
{
    $productModel = new Products();

    // Retrieve product details from the form
    $productData = [
        'product_name' => $this->request->getPost('product_name'),
        'product_price' => $this->request->getPost('product_price'),
        'quantity' => $this->request->getPost('quantity'),
        'category_id' => $this->request->getPost('category_id'),
        'brand_id' => $this->request->getPost('brand_id'),
        'status' => $this->request->getPost('status'),
        'feature_product' => $this->request->getPost('feature_product'),
        'product_desc' => $this->request->getPost('product_desc'),
        'style_number' => $this->request->getPost('style_number'),
        'dia_pcs' => $this->request->getPost('dia_pcs'),
        'dia_quality' => $this->request->getPost('dia_quality'),
        'dia_cts' => $this->request->getPost('dia_cts'),
        'dia_color' => $this->request->getPost('dia_color'),
        'silver_net_wt' => $this->request->getPost('silver_net_wt'),
        'length_bracelet' => $this->request->getPost('length_bracelet') !== '' ? $this->request->getPost('length_bracelet') : null,
        'pearl_piece' => $this->request->getPost('pearl_piece') !== '' ? $this->request->getPost('pearl_piece') : null,
        'pearl_wt' => $this->request->getPost('pearl_wt') !== '' ? $this->request->getPost('pearl_wt') : null,
        'bangle_size' => $this->request->getPost('bangle_size') !== '' ? $this->request->getPost('bangle_size') : null,
        'total_price' => $this->request->getPost('total_price'),
    ];

    // Debugging: Log form data
    log_message('debug', 'Form Data: ' . print_r($productData, true));

    // Prepare directory for storing images
    $productId = $this->request->getPost('product_id') ?? uniqid();
    $sanitizedProductName = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($productData['product_name']));
    $folderName = $productId . '_' . $sanitizedProductName;
    $uploadPath = ROOTPATH . '/assets/images/upload/' . $folderName;

    // Create directory if it doesn’t exist
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Initialize array to store paths of uploaded images
    $images = [];

    // Use $_FILES to maintain the order of file selection
    if (!empty($_FILES['product_image']['name'])) {
        $fileCount = count($_FILES['product_image']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $file = [
                'name' => $_FILES['product_image']['name'][$i],
                'type' => $_FILES['product_image']['type'][$i],
                'tmp_name' => $_FILES['product_image']['tmp_name'][$i],
                'error' => $_FILES['product_image']['error'][$i],
                'size' => $_FILES['product_image']['size'][$i],
            ];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $newName = $file['name']; // Use the original file name
                $destination = $uploadPath . '/' . $newName;

                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    // Store the relative path for the image
                    $images[] = $folderName . '/' . $newName;
                    log_message('debug', 'File moved successfully: ' . $newName);
                } else {
                    // Log error if file movement fails
                    log_message('error', 'Failed to move file: ' . $file['name']);
                    return redirect()->back()->with('error', 'Failed to upload one or more images.');
                }
            } else {
                log_message('error', 'File upload error: ' . $file['name']);
            }
        }
    } else {
        log_message('error', 'No files were uploaded.');
        return redirect()->back()->with('error', 'No files were uploaded.');
    }

    // Add image paths to product data as a JSON-encoded string
    $productData['product_images'] = !empty($images) ? json_encode($images) : null;

    // Debugging: Log product data before insertion
    log_message('debug', 'Product Data to Insert: ' . print_r($productData, true));

    // Insert product data into the database
    try {
        $productModel->insert($productData);
        log_message('debug', 'Product Inserted Successfully');
        return redirect()->to(base_url('admin/product/all_products'))->with('success', 'Product added successfully');
    } catch (\Exception $e) {
        // Log database insertion error
        log_message('error', 'Failed to add product: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to add product: ' . $e->getMessage());
    }
}


public function check_edit_product()
{
    $productModel = new Products();

    // Retrieve product ID from the form
    $productId = $this->request->getPost('product_id');

    // Fetch existing product data
    $existingProduct = $productModel->find($productId);
    if (!$existingProduct) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    // Retrieve updated product details from the form
    $productData = [
        'product_name' => $this->request->getPost('product_name'),
        'product_price' => $this->request->getPost('product_price'),
        'quantity' => $this->request->getPost('quantity'),
        'category_id' => $this->request->getPost('category_id'),
        'brand_id' => $this->request->getPost('brand_id'),
        'status' => $this->request->getPost('status'),
        'feature_product' => $this->request->getPost('feature_product'),
        'product_desc' => $this->request->getPost('product_desc'),
        'style_number' => $this->request->getPost('style_number'),
        'dia_pcs' => $this->request->getPost('dia_pcs'),
        'dia_quality' => $this->request->getPost('dia_quality'),
        'dia_cts' => $this->request->getPost('dia_cts'),
        'dia_color' => $this->request->getPost('dia_color'),
        'silver_net_wt' => $this->request->getPost('silver_net_wt'),
        'length_bracelet' => $this->request->getPost('length_bracelet') !== '' ? $this->request->getPost('length_bracelet') : null,
        'pearl_piece' => $this->request->getPost('pearl_piece') !== '' ? $this->request->getPost('pearl_piece') : null,
        'pearl_wt' => $this->request->getPost('pearl_wt') !== '' ? $this->request->getPost('pearl_wt') : null,
        'bangle_size' => $this->request->getPost('bangle_size') !== '' ? $this->request->getPost('bangle_size') : null,
        'total_price' => $this->request->getPost('total_price'),
    ];

    // Debugging: Log form data
    log_message('debug', 'Form Data: ' . print_r($productData, true));

    // Prepare directory for storing images
    $sanitizedProductName = preg_replace('/[^a-zA-Z0-9-]/', '', strtolower($productData['product_name']));
    $folderName = $productId . '_' . $sanitizedProductName;
    $uploadPath = ROOTPATH . '/assets/images/upload/' . $folderName;

    // Create directory if it doesn’t exist
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Initialize array to store paths of uploaded images
    $images = [];

    // Use $_FILES to maintain the order of file selection
    if (!empty($_FILES['product_image']['name'])) {
        $fileCount = count($_FILES['product_image']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $file = [
                'name' => $_FILES['product_image']['name'][$i],
                'type' => $_FILES['product_image']['type'][$i],
                'tmp_name' => $_FILES['product_image']['tmp_name'][$i],
                'error' => $_FILES['product_image']['error'][$i],
                'size' => $_FILES['product_image']['size'][$i],
            ];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $newName = $file['name']; // Use the original file name
                $destination = $uploadPath . '/' . $newName;

                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    // Store the relative path for the image
                    $images[] = $folderName . '/' . $newName;
                    log_message('debug', 'File moved successfully: ' . $newName);
                } else {
                    // Log error if file movement fails
                    log_message('error', 'Failed to move file: ' . $file['name']);
                    return redirect()->back()->with('error', 'Failed to upload one or more images.');
                }
            } else {
                log_message('error', 'File upload error: ' . $file['name']);
            }
        }
    } else {
        // If no new images are uploaded, retain the existing images
        $images = json_decode($existingProduct['product_images'], true) ?? [];
    }

    // Add image paths to product data as a JSON-encoded string
    $productData['product_images'] = !empty($images) ? json_encode($images) : null;

    // Debugging: Log product data before update
    log_message('debug', 'Product Data to Update: ' . print_r($productData, true));

    // Update product data in the database
    try {
        $productModel->update($productId, $productData);
        log_message('debug', 'Product Updated Successfully');
        return redirect()->to(base_url('admin/product/all_products'))->with('success', 'Product updated successfully');
    } catch (\Exception $e) {
        // Log database update error
        log_message('error', 'Failed to update product: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
    }
}

  
public function view_product($id)
{
    $productModel = new Products();
    $product = $productModel->getProductById($id);

    if ($product) {
        // Decode product_images JSON to an array, or use an empty array if there are no images
        $product['product_images'] = json_decode($product['product_images'] ?? '[]', true);

        // Set the main image to the first image in the array if available, else use a default placeholder
        $product['product_image'] = $product['product_images'][0] ?? 'default.jpg';
    }

    return view('Admin/Product/view_product', ['product' => $product]);
}

  public function add_product()
  {
    $categoriesModel = new Categories();
    $brandsModel = new Brands();
    $data['categories'] = $categoriesModel->findAll();
    $data['brands'] = $brandsModel->findAll();
    // $data['products'] = $productModel->getAllProduct();
    // print_r($data);exit();
    return view('Admin/Product/add_product', $data);
  }

  public function delete_product($id)
  {
      $productModel = new Products();
      $cartModel = new Carts();
  
      // Check if the product exists
      $product = $productModel->find($id);
  
      if ($product) {
          // Delete all cart entries associated with this product
          $cartModel->where('product_id', $id)->delete();
  
          // Now delete the product
          $productModel->delete($id);
  
          $successMessage = "Product '{$product['product_name']}' and all associated cart entries have been deleted successfully.";
          return redirect()->to(base_url('admin/product/all_products'))->with('success', $successMessage);
      } else {
          $errorMessage = "Product with ID '{$id}' not found.";
          return redirect()->to(base_url('admin/product/all_products'))->with('error', $errorMessage);
      }
  }
  
public function edit_product($id)
{
    $productModel = new Products();
    $categoriesModel = new Categories();
    $brandsModel = new Brands();

    $product = $productModel->getProductById($id);

    if (!$product) {
        return redirect()->to('/admin/product/all_products')->with('error', 'Product not found.');
    }

    $data['product'] = (object) $product; // Ensure product is an object
    $data['categories'] = $categoriesModel->findAll();
    $data['brands'] = $brandsModel->findAll();

    return view('Admin/Product/edit_product', $data);
}


  // ========== End Products Controller Function =========//

  // ========== Start Categories Controller Function =========//
  public function all_categories()
  {
    $categoriesModel = new Categories();
    $data['categories'] = $categoriesModel->findAll();
    return view('Admin/Category/all_categories', $data);
  }


  public function add_category()
  {
    $categoriesModel = new Categories();
    return view('Admin/Category/add_category');
  }

  public function check_add_category()
  {
    $categoryModel = new Categories();
    $Rules = [
      'file' => [
        'uploaded[category_image]',
        'ext_in[category_image,jpg,jpeg,png,webp]',
        'max_size[category_image,2048]',
      ],
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('category_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . '/assets/images/upload/Category/', $img_name);
      $data = [
        'category_name' => $this->request->getVar('category_name'),
        'category_desc' => $this->request->getVar('category_desc'),
        'status' => $this->request->getVar('status'),
        'category_image' => $img_name,
        'slug' => $this->request->getVar('slug'),
      ];

      $categoryModel->insert($data);
      $successMessage = "Category has been added successfully.";
      return redirect()->to(base_url('/Admin/Category/all_categories'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function view_category($id)
  {
    $categoryModel = new Categories();
    $data['category'] = $categoryModel->find($id);
    return view('Admin/Category/view_category', $data);
  }
  public function edit_category($id)
  {
    $categoryModel = new Categories();
    $data['category'] = $categoryModel->find($id);
    return view('Admin/Category/edit_category', $data);
  }
  public function check_edit_category()
  {
    $categoryModel = new Categories();
    $Rules = [
      'file' => [
        'uploaded[category_image]',
        'ext_in[category_image,jpg,jpeg,png,webp]',
        'max_size[category_image,2048]',
      ],
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('category_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . '/assets/images/upload/Category/', $img_name);
      $data = [
        'category_name' => $this->request->getVar('category_name'),
        'category_desc' => $this->request->getVar('category_desc'),
        'status' => $this->request->getVar('status'),
        'category_image' => $img_name,
        'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('category_id');

      $categoryModel->update(['category_id' => $id], $data);
      $successMessage = "Category has been Updated successfully.";
      return redirect()->to(base_url('/Admin/Category/all_categories'))->with('success', $successMessage);
      ;
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }
  public function delete_category($id)
  {
    $categoryModel = new Categories();
    $category = $categoryModel->find($id);

    if ($category) {
      // Delete associated products first
      $productModel = new Products();
      $productModel->where('category_id', $id)->delete();

      // Then delete the category
      $categoryModel->delete($id);

      $successMessage = "Category '{$category['category_name']}' has been deleted successfully. and also delete that product which assign this category '{$category['category_name']}'";
      return redirect()->to(base_url('Admin/Category/all_categories'))->with('success', $successMessage);
    } else {
      $errorMessage = "Category with ID '{$id}' not found.";
      return redirect()->to(base_url('Admin/Category/all_categories'))->with('error', $errorMessage);
    }
  }
  // ========== End Categories Controller Function =========//

  // ========== Start Brand Controller Function =========//
  public function all_brands()
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->findAll();
    return view('Admin/Brand/all_brands', $data);
  }
  public function add_brands()
  {
    $brandsModel = new Brands();
    return view('Admin/Brand/add_brands');
  }

  public function check_add_brands()
  {
    $brandsModel = new Brands();
    $Rules = [
      'file' => [
        'uploaded[brand_image]',
        'ext_in[brand_image,jpg,jpeg,png,webp]',
        'max_size[brand_image,2048]',
      ],
      'brand_name' => 'required',
      'brand_desc' => 'required',
      // 'brand_image' => 'required',
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('brand_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . '/assets/images/upload/brand', $img_name);
      // echo $img_name;exit();
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
        'brand_image' => $this->request->getVar('brand_image'),
        // 'status' => $this->request->getVar('status'),
        // 'slug' => $this->request->getVar('slug'),
      ];

      $brandsModel->insert($data);
      $successMessage = "Brand has been added successfully.";
      return redirect()->to(base_url('/Admin/brands/all_brands'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }
  public function view_brands($id)
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->find($id);
    return view('Admin/Brand/view_brands', $data);
  }

  public function edit_brands($id)
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->find($id);
    return view('Admin/Brand/edit_brands', $data);
  }
  public function check_edit_brands()
  {
    $brandsModel = new Brands();
    $Rules = [
      'file' => [
        'uploaded[brand_image]',
        'ext_in[brand_image,jpg,jpeg,png,webp]',
        'max_size[brand_image,2048]',
      ],
      'brand_name' => 'required',
      'brand_desc' => 'required',
      'brand_image' => 'required'
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('product_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . '/assets/images/upload/brand', $img_name);
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
        'brand_image' => $this->request->getVar('brand_image'),
        // 'status' => $this->request->getVar('status'),
        // 'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('brand_id');

      $brandsModel->update(['brand_id' => $id], $data);
      $successMessage = "Brand has been Updated successfully.";
      return redirect()->to(base_url('/Admin/Brand/all_brands'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }

  public function delete_brands($id)
  {
    $brandsModel = new Brands();
    $brands = $brandsModel->find($id);

    if ($brands) {
      // Delete associated products first
      $productModel = new Products();
      $productModel->where('brand_id', $id)->delete();

      // Then delete the Brand
      $brandsModel->delete($id);

      $successMessage = "Brands '{$brands['brand_name']}' has been deleted successfully. and also delete that product which assign this brand '{$brands['brand_name']}'";
      return redirect()->to(base_url('Admin/brands/all_brands'))->with('success', $successMessage);
    } else {
      $errorMessage = "Brand with ID '{$id}' not found.";
      return redirect()->to(base_url('Admin/brands/all_brands'))->with('error', $errorMessage);
    }
  }

  public function all_orders()
  {
    $ordersModel = new OrderModel();
    $data['orders'] = $ordersModel->findAll();
    return view('Admin/Order/all_orders', $data);
  }

public function check_edit_order()
{
    $orderModel = new OrderModel();

    // Validate input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'customer_name' => 'required',
        'product_name' => 'required',
        'total_amount' => 'required|numeric',
        'status' => 'required',
        'color' => 'required',
        'address_line_1' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postal_code' => 'required',
        'country' => 'required',
        'style_number' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Prepare data
    $data = [
        'customer_name' => $this->request->getPost('customer_name'),
        'product_name' => $this->request->getPost('product_name'),
        'total_amount' => $this->request->getPost('total_amount'),
        'status' => $this->request->getPost('status'),
        'color' => $this->request->getPost('color'),
        'address_line_1' => $this->request->getPost('address_line_1'),
        'address_line_2' => $this->request->getPost('address_line_2'),
        'city' => $this->request->getPost('city'),
        'state' => $this->request->getPost('state'),
        'postal_code' => $this->request->getPost('postal_code'),
        'country' => $this->request->getPost('country'),
        'style_number' => $this->request->getPost('style_number'),
    ];

    // Update order
    $order_id = $this->request->getPost('order_id');
    if ($orderModel->update($order_id, $data)) {
        return redirect()->to('/admin/orders/all_orders')->with('success', 'Order updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update order.');
    }
}

public function edit_order($order_id)
{
    $orderModel = new OrderModel();

    // Fetch the order by ID
    $order = $orderModel->find($order_id);

    if (!$order) {
        return redirect()->to('/admin/order/all_orders')->with('error', 'Order not found.');
    }

    // Pass order data to the view
    $data['order'] = $order;
    return view('Admin/Order/edit_order', $data);
}

public function view_order($order_id)
{
    $orderModel = new OrderModel();

    // Fetch the order by ID
    $order = $orderModel->find($order_id);

    if (!$order) {
        return redirect()->to('/admin/order/all_orders')->with('error', 'Order not found.');
    }

    // Pass order data to the view
    return view('Admin/Order/view_order', ['order' => $order]);
}

  public function delete_orders($id)
  {
    $ordersModel = new OrderModel();
    $brands = $ordersModel->find($id);

    if ($brands) {
      // Delete associated products first
      $productModel = new Products();
      $productModel->where('brand_id', $id)->delete();

      // Then delete the Brand
      $ordersModel->delete($id);

      $successMessage = "Order '{$brands['order_id']}' has been deleted successfully. and also delete that product which assign this order '{$brands['brand_name']}'";
      return redirect()->to(base_url('Admin/orders/all_orders'))->with('success', $successMessage);
    } else {
      $errorMessage = "Brand with ID '{$id}' not found.";
      return redirect()->to(base_url('Admin/orders/all_orders'))->with('error', $errorMessage);
    }
  }
  
  public function all_reviews()
    {
        $reviewModel = new ReviewModel();
        $data['reviews'] = $reviewModel->select('reviews.*, customers.customer_name, products.product_name')
                                       ->join('customers', 'customers.customer_id = reviews.customer_id')
                                       ->join('products', 'products.product_id = reviews.product_id')
                                       ->findAll();
        return view('Admin/Review/all_reviews', $data);
    }

    public function view_review($review_id)
    {
        $reviewModel = new ReviewModel();

        // Fetch the review by ID
        $review = $reviewModel->select('reviews.*, customers.customer_name, products.product_name')
                              ->join('customers', 'customers.customer_id = reviews.customer_id')
                              ->join('products', 'products.product_id = reviews.product_id')
                              ->find($review_id);

        if (!$review) {
            return redirect()->to('/admin/review/all_reviews')->with('error', 'Review not found.');
        }

        // Pass review data to the view
        return view('Admin/Review/view_reviews', ['review' => $review]);
    }

    public function delete_review($review_id)
    {
        $reviewModel = new ReviewModel();
        $review = $reviewModel->find($review_id);

        if ($review) {
            // Delete the review
            $reviewModel->delete($review_id);

            $successMessage = "Review ID '{$review['review_id']}' has been deleted successfully.";
            return redirect()->to(base_url('admin/review/all_reviews'))->with('success', $successMessage);
        } else {
            $errorMessage = "Review with ID '{$review_id}' not found.";
            return redirect()->to(base_url('admin/review/all_reviews'))->with('error', $errorMessage);
        }
    }
}