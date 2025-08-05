<?php
// app/Controllers/Kasir.php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kasir extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Kasir Dashboard';
        $data['user'] = [
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];
        return view('kasir/dashboard', $data);
    }
}