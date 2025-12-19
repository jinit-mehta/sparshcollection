<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class adminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is authenticated as an admin
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('admin/login'); // Redirect to admin login page
        }
    }
    // public function before(RequestInterface $request, $arguments = null)
    // {
    //     if (!session()->get('admin_logged_in')) {
    //         return redirect()->to('/admin/login');
    //     }
    // }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}