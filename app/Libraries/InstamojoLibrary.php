<?php

namespace App\Libraries;

use Instamojo\Instamojo;

class InstamojoLibrary
{
    protected $api;

    public function __construct()
    {
        // Initialize Instamojo with your API key and auth token
        $this->api = new Instamojo(
            'test_da3ee87447f5e22e6728541d1c3',
            'test_ec781fc53d316fedf97a37ac93a',
            'https://test.instamojo.com/api/1.1/'
        );
    }

    public function createPaymentRequest($paymentData)
    {
        // Implement logic to create a payment request
        // Use $this->api->createPaymentRequest() method
    }

    public function verifyPaymentStatus($paymentResponse)
    {
        // Implement logic to verify payment status
        // Use $this->api->getOrderById() method
    }
}