<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // Name of the database table
    protected $primaryKey = 'order_id'; // Primary key of the table

    // Fields that can be mass-assigned
    protected $allowedFields = [
        'customer_id',
        'customer_name',
        'product_id',
        'product_name',
        'total_amount',
        'payment_id',
        'payer_id',
        'status',
        'payment_method', // Payment method
        'invoice_path',   // Invoice path
        'created_at',     // Created timestamp
        'updated_at',     // Updated timestamp
        'color',          // Color choice
        'address_line_1', // Address line 1
        'address_line_2', // Address line 2
        'city',           // City
        'state',          // State
        'postal_code',    // Postal code
        'country',        // Country
        'style_number',
        'length_bracelet'
    ];

    // Enable automatic handling of created_at and updated_at timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // If you want to use soft deletes (optional)
    // protected $useSoftDeletes = true;
    // protected $deletedField = 'deleted_at';
}