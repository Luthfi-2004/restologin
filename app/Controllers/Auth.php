<?php
// app/Controllers/Auth.php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (session()->get('logged_in')) {
            return $this->redirectBasedOnRole();
        }

        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register Pelanggan';
        return view('auth/register', $data);
    }

    public function processLogin()
    {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByEmailOrUsername($login);

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Login atau password salah!');
        }

        // Set session
        $sessionData = [
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role'],
            'logged_in' => true
        ];

        session()->set($sessionData);

        return redirect()->to($this->getRedirectUrl($user['role']))->with('success', 'Login berhasil!');
    }

    public function processRegister()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role' => 'pelanggan' // Default role untuk registrasi publik
        ];

        if ($this->userModel->save($data)) {
            return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Registrasi gagal! Silakan coba lagi.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Logout berhasil!');
    }

    private function redirectBasedOnRole()
    {
        $role = session()->get('role');
        return redirect()->to($this->getRedirectUrl($role));
    }

    private function getRedirectUrl($role)
    {
        switch ($role) {
            case 'admin':
                return '/admin/dashboard';
            case 'kasir':
                return '/kasir/dashboard';
            case 'pelanggan':
                return '/pelanggan/dashboard';
            default:
                return '/';
        }
    }
}