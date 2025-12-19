<?php

namespace App\Libraries;

use CodeIgniter\Shield\Auth as ShieldAuth;
use CodeIgniter\Shield\Config\Auth;

class CustomAuth extends ShieldAuth
{
    public function __construct(Auth $config)
    {
        parent::__construct($config);
    }
}