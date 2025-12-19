<?php

namespace App\Models;

use CodeIgniter\Model;

class Carts extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'customer_id', 'customer_name', 'product_id', 'product_name', 'quantity', 'created_at', 'style_number', 'color','length_bracelet'];

    /**
     * Fetch cart products for a specific customer.
     *
     * @param int $customer_id
     * @return array
     */
public function getCartProducts($customer_id)
{
    static $cache = [];

    if (isset($cache[$customer_id])) {
        return $cache[$customer_id];
    }

    $result = $this->select('carts.cart_id, carts.quantity, carts.color, carts.length_bracelet, products.product_id, products.product_name, products.product_price, products.product_images, products.style_number')
        ->join('products', 'products.product_id = carts.product_id')
        ->where('carts.customer_id', $customer_id)
        ->get()
        ->getResultArray();

    $cache[$customer_id] = $result;

    return $result;
}

    /**
     * Delete cart items for a specific customer.
     *
     * @param int $customer_id
     * @return bool
     */
    public function deleteCartItemsByCustomerId($customer_id)
    {
        // Use a direct delete query for efficiency
        return $this->where('customer_id', $customer_id)
            ->delete();
    }
}