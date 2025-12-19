<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Disable legacy auto-routing for better security.

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// ============ Start Admin Routes ============
$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('logout', 'Admin::adminLogout');

    // Products Routes
    $routes->get('product/all_products', 'Admin::all_products');
    $routes->post('product/check_add_product', 'Admin::check_add_product');
    $routes->post('product/check_edit_product', 'Admin::check_edit_product');
    $routes->get('product/add_product', 'Admin::add_product');
    $routes->get('product/delete_product/(:num)', 'Admin::delete_product/$1');
    $routes->get('product/view_product/(:num)', 'Admin::view_product/$1');
    $routes->get('product/edit_product/(:num)', 'Admin::edit_product/$1');

    // Categories Routes
    $routes->get('category/all_categories', 'Admin::all_categories');
    $routes->get('category/add_category', 'Admin::add_category');
    $routes->post('category/check_add_category', 'Admin::check_add_category');
    $routes->get('category/view_category/(:num)', 'Admin::view_category/$1');
    $routes->get('category/edit_category/(:num)', 'Admin::edit_category/$1');
    $routes->post('category/check_edit_category', 'Admin::check_edit_category');
    $routes->get('category/delete_category/(:num)', 'Admin::delete_category/$1');

    // Brands Routes
    $routes->get('brands/all_brands', 'Admin::all_brands');
    $routes->get('brands/add_brands', 'Admin::add_brands');
    $routes->post('brands/check_add_brands', 'Admin::check_add_brands');
    $routes->get('brands/view_brands/(:num)', 'Admin::view_brands/$1');
    $routes->get('brands/edit_brands/(:num)', 'Admin::edit_brands/$1');
    $routes->post('brands/check_edit_brands', 'Admin::check_edit_brands');
    $routes->get('brands/delete_brands/(:num)', 'Admin::delete_brands/$1');

    // Orders Routes
    $routes->get('orders/all_orders', 'Admin::all_orders');
    $routes->get('orders/edit_order/(:num)', 'Admin::edit_order/$1');
    $routes->post('orders/check_edit_order', 'Admin::check_edit_order');
    $routes->get('orders/view_order/(:num)', 'Admin::view_order/$1');

    // Reviews Routes
    $routes->get('review/all_reviews', 'Admin::all_reviews');
    $routes->get('review/view_review/(:num)', 'Admin::view_review/$1');
    $routes->get('review/delete_review/(:num)', 'Admin::delete_review/$1');
});

$routes->get('admin/login', 'Admin::login');
$routes->post('admin/adminAuth', 'Admin::adminAuth');
$routes->get('admin/register', 'Admin::register');
$routes->post('admin/register_check', 'Admin::register_check');

// ============ End Admin Routes ============

// ============ Start OpenAI Routes ============
$routes->get('openai', 'OpenAIController::index');
$routes->post('openai/generateImages', 'OpenAIController::generateImages');
// ============ End OpenAI Routes ============

// ============ Start Frontend Routes ============
$routes->get('/', 'Home::home');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->post('home/submitContactForm', 'Home::submitContactForm');
$routes->get('/return-policy', 'Home::returnPolicy');
$routes->get('/shipping-policy', 'Home::shippingPolicy');
$routes->get('/jewellery-care', 'Home::jewelleryCare');
$routes->get('/privacy-policy', 'Home::privacyPolicy');
$routes->post('/submit-review', 'Home::submitReview');

// Products
$routes->get('/allproducts', 'Home::allProducts');
$routes->get('/product/single_product/(:num)', 'Home::single_product/$1');

// Customer Routes
$routes->group('customer', function ($routes) {
    $routes->get('register', 'Customer::register');
    $routes->post('register_check', 'Customer::register_check');
    $routes->get('login', 'Customer::login');
    $routes->post('login', 'Customer::customerAuth');
    $routes->get('logout', 'Customer::logout');
    $routes->get('google-login', 'Customer::google_login');
    $routes->get('orders', 'Customer::orders');
});

// Carts and Checkout
$routes->get('/cart', 'CartsController::cart');
$routes->post('/cart/add/(:num)', 'CartsController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartsController::remove/$1');
$routes->post('/cart/update/(:num)', 'CartsController::update/$1');
$routes->get('/checkout', 'CartsController::checkout');
$routes->post('/buy-now/(:num)', 'CartsController::buyNow/$1');

// Payments
$routes->post('/initiatePayment', 'PaymentController::initiatePayment'); // Handle payment initiation (legacy or fallback)
$routes->post('/initiateRazorpayPayment', 'PaymentController::initiateRazorpayPayment'); // Handle Razorpay payment initiation
$routes->post('/razorpay/processPayment', 'PaymentController::processRazorpayPayment'); // Handle Razorpay payment processing (if needed)
$routes->get('/payment/success', 'PaymentController::razorpayPaymentSuccess'); // Handle successful payment
$routes->get('/payment/cancel', 'PaymentController::cancelPayment'); // Handle payment cancellation
$routes->post('/handleCashOnDelivery', 'PaymentController::handleCashOnDelivery');
$routes->get('/cashOnDeliveryFailed', 'PaymentController::cashOnDeliveryFailed');
$routes->get('download-invoice/(:any)', 'PaymentController::downloadInvoice/$1');
// Product Filters
$routes->post('/products/filterByAllProducts', 'ProductFilter::filterByAllProducts');
$routes->post('/productfilter/filterbycategory', 'ProductFilter::filterByCategory');

$routes->post('/products/filterByBrands', 'ProductFilter::filterByBrands');
$routes->post('/products/filterProducts', 'ProductFilter::filterProducts');


// ============ End Frontend Routes ============

/*
 * --------------------------------------------------------------------
 * Myth\Auth (Optional Authentication Setup)
 * --------------------------------------------------------------------
 * Uncomment this section if you're using Myth\Auth.
 */
// $routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function ($routes) {
//     $routes->get('login', 'AuthController::login', ['as' => 'login']);
//     $routes->post('login', 'AuthController::attemptLogin');
//     $routes->get('logout', 'AuthController::logout');
//     $routes->get('register', 'AuthController::register', ['as' => 'register']);
//     $routes->post('register', 'AuthController::attemptRegister');
// });

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
