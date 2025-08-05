<?php
// app/Controllers/Admin.php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function dashboard()
    {
        $data['title'] = 'Admin Dashboard';
        $data['user'] = [
            'username' => session()->get('username'),
            'role' => session()->get('role')
        ];
        
        // Get user statistics
        $data['stats'] = [
            'total_users' => $this->userModel->countAll(),
            'total_pelanggan' => $this->userModel->where('role', 'pelanggan')->countAllResults(),
            'total_kasir' => $this->userModel->where('role', 'kasir')->countAllResults(),
            'total_admin' => $this->userModel->where('role', 'admin')->countAllResults()
        ];
        
        return view('admin/dashboard', $data);
    }

    public function users()
    {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->userModel->findAll();
        return view('admin/users', $data);
    }

    public function createUser()
    {
        $data['title'] = 'Tambah User';
        return view('admin/create_user', $data);
    }

    public function storeUser()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[admin,kasir]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];

        if ($this->userModel->save($data)) {
            return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan user!');
        }
    }

    public function deleteUser($id)
    {
        // Tidak bisa hapus diri sendiri
        if ($id == session()->get('user_id')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        if ($this->userModel->delete($id)) {
            return redirect()->back()->with('success', 'User berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus user!');
        }
    }
}