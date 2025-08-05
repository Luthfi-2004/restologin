<?php
// app/Config/Routes.php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth routes
$routes->group('auth', function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::processLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::processRegister');
    $routes->get('logout', 'Auth::logout');
});

// Admin routes
$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('users', 'Admin::users');
    $routes->get('users/create', 'Admin::createUser');
    $routes->post('users/store', 'Admin::storeUser');
    $routes->get('users/delete/(:num)', 'Admin::deleteUser/$1');
});

// Kasir routes
$routes->group('kasir', ['filter' => 'auth:kasir'], function($routes) {
    $routes->get('dashboard', 'Kasir::dashboard');
});

// Pelanggan routes
$routes->group('pelanggan', ['filter' => 'auth:pelanggan'], function($routes) {
    $routes->get('dashboard', 'Pelanggan::dashboard');
});

// Default route
$routes->get('/', 'Auth::login');