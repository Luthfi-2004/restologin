<?php
// app/Filters/AuthFilter.php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Anda harus login terlebih dahulu!');
        }
        
        // If specific role is required, check it
        if ($arguments && count($arguments) > 0) {
            $requiredRole = $arguments[0];
            $userRole = session()->get('role');
            
            if ($userRole !== $requiredRole) {
                return redirect()->to('/auth/login')->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}