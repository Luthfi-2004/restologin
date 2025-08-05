<?php
// app/Controllers/Pelanggan.php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pelanggan extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Pelanggan Dashboard';
        $data['user'] = [
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];
        return view('pelanggan/dashboard', $data);
    }
}