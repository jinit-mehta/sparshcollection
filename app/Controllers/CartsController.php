<?php

namespace App\Controllers;

use App\Models\Carts;
use App\Models\Products;

class CartsController extends BaseController
{
    public function cart()
    {
        $session = \Config\Services::session();
        $customer_id = $session->get('customer_id');

        if (!$customer_id) {
            return redirect()->to('/customer/login'); // Redirect to login page if not logged in
        }

        $cartModel = new Carts();
        $data['cartProducts'] = $cartModel->getCartProducts($customer_id);

        // Calculate total price
        $totalPrice = 0;
        foreach ($data['cartProducts'] as $product) {
            $totalPrice += $product['product_price'] * $product['quantity'];
        }
        $data['totalPrice'] = $totalPrice;

        return view('FrontEnd/cart', $data);
    }

   public function add($id)
{
    $cartModel = new Carts();
    $session = \Config\Services::session();
    $customer_id = $session->get('customer_id');

    // Fetch the product to get its details
    $productModel = new Products();
    $product = $productModel->find($id);

    if (!$product) {
        return redirect()->to('/cart')->with('error', "Product not found");
    }

    // Get the selected color and length from the form
    $selectedColor = $this->request->getVar('color');
    $selectedLength = $this->request->getVar('length');

    // Check if product is already in the cart
    $existingCart = $cartModel->where(['customer_id' => $customer_id, 'product_id' => $id])->first();

    if ($existingCart) {
        // Update quantity if product already exists in cart
        $data = [
            'style_number' => $existingCart['style_number'],
            'quantity' => $existingCart['quantity'] + 1,
            'color' => $selectedColor,
            'length_bracelet' => $selectedLength, // Add length to the update
        ];
        $cartModel->update($existingCart['cart_id'], $data);
    } else {
       $data = [
    'customer_id' => $customer_id,
    'product_id' => $id,
    'product_name' => $product['product_name'],
    'product_price' => $product['product_price'],
    'product_image' => $product['product_image'],
    'style_number' => $product['style_number'], // Ensure style_number is stored
    'color' => $selectedColor,
    'length_bracelet' => $selectedLength,
    'quantity' => 1
];
        $cartModel->insert($data);
    }

    return redirect()->to('/cart')->with('success', "Product added successfully");
}
    // Remove product from cart
    public function remove($id)
    {
        $cartModel = new Carts();
        $cartEntry = $cartModel->where('cart_id', $id)->first();

        if ($cartEntry) {
            $cartModel->delete($id); // Delete the cart entry
            return redirect()->to('/cart')->with('success', "Product removed successfully");
        } else {
            return redirect()->to('/cart')->with('error', "Cart entry not found");
        }
    }

    // Update product quantity in cart
    public function update($id)
    {
        $cartModel = new Carts();
        $session = \Config\Services::session();
        $customer_id = $session->get('customer_id');

        // Get the new quantity from the request
        $newQuantity = $this->request->getVar('quantity');

        // Fetch the cart entry
        $cartEntry = $cartModel->where('cart_id', $id)->first();

        if (!$cartEntry) {
            return $this->response->setJSON(['success' => false, 'message' => 'Cart entry not found']);
        }

        if ($newQuantity == 0) {
            // Remove the product if quantity is 0
            $cartModel->delete($id);
        } else {
            // Update the quantity
            $data = [
                'quantity' => $newQuantity,
            ];
            $cartModel->update($id, $data);
        }

        // Recalculate the total price
        $cartProducts = $cartModel->getCartProducts($customer_id);
        $totalPrice = 0;
        foreach ($cartProducts as $product) {
            $totalPrice += $product['product_price'] * $product['quantity'];
        }

        // Return JSON response
        return $this->response->setJSON([
            'success' => true,
            'totalPrice' => $totalPrice
        ]);
    }

public function checkout()
{
    $session = \Config\Services::session();
    $customer_id = $session->get('customer_id');

    if (!$customer_id) {
        return redirect()->to('/customer/login'); // Redirect to login page if not logged in
    }

    $cartModel = new Carts();

    if ($session->has('buy_now_product')) {
        $data['cartProducts'] = [$session->get('buy_now_product')]; 
        $session->remove('buy_now_product'); 
    } else {
        $data['cartProducts'] = $cartModel->getCartProducts($customer_id);
    }

    // Calculate total price
    $totalPrice = 0;
    foreach ($data['cartProducts'] as $product) {
        $totalPrice += $product['product_price'] * $product['quantity'];
    }
    $data['totalPrice'] = $totalPrice;

    return view('FrontEnd/checkout', $data);
}
    
public function buyNow($id)
{
    $session = \Config\Services::session();
    $customer_id = $session->get('customer_id');

    if (!$customer_id) {
        return redirect()->to('/customer/login'); // Redirect to login if not logged in
    }

    $productModel = new Products();
    $product = $productModel->find($id);

    if (!$product) {
        return redirect()->to('/')->with('error', "Product not found");
    }

    // Get selected color from the query string
    $selectedColor = $this->request->getGet('color');

    // Store product details in session
    $session->set('buy_now_product', [
        'product_id' => $id,
        'product_name' => $product['product_name'],
        'product_price' => $product['product_price'],
        'product_image' => $product['product_image'],
        'style_number' => $product['style_number'],
        'color' => $selectedColor,
        'quantity' => 1
    ]);

    return redirect()->to('/checkout');
}

}
