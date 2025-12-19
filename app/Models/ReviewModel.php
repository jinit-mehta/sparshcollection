<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'review_id';
    protected $allowedFields = ['product_id', 'customer_id', 'rating', 'comment', 'images'];
    protected $useTimestamps = true; // Enable timestamps
    protected $createdField = 'created_at'; // Use 'created_at' for creation time
    protected $updatedField = 'updated_at'; // Use 'updated_at' for update time

    // Fetch reviews for a specific product
    public function getProductReviews($product_id)
    {
        return $this->db->table('reviews')
            ->select('reviews.*, customers.customer_name')
            ->join('customers', 'customers.customer_id = reviews.customer_id')
            ->where('product_id', $product_id)
            ->orderBy('created_at', 'DESC') // Sort by latest reviews first
            ->get()
            ->getResultArray();
    }

    // Get average rating for a product
    public function getAverageRating($product_id)
    {
        $result = $this->db->table('reviews')
            ->selectAvg('rating')
            ->where('product_id', $product_id)
            ->get()
            ->getRowArray();

        return $result ? $result : ['rating' => 0];
    }
}