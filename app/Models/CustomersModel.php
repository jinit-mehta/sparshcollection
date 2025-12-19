<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $allowedFields = ['customer_name', 'customer_password', 'customer_email', 'customer_address', 'customer_phone_no', 'created_at'];

    public function find($id = null)
    {
        return $this->asArray()->where(['customer_id' => $id])->first();
    }
}
