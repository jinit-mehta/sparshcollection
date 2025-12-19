<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name', 'category_image', 'category_desc', 'status', 'slug', 'category_added_at'];

    // Get all active categories
    public function getActiveCategories()
    {
        return $this->where('status', 1)->findAll(); // assuming 'status' is 1 for active categories
    }
}
