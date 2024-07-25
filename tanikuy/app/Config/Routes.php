<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//petaniseller
$routes->get('/', 'Home::index');

$routes->group('/', function ($routes) {
    $routes->get('beranda', 'Home::beranda');
    $routes->get('marketplace', 'Home::marketplace');
    $routes->get('forum', 'Home::forum');
    $routes->get('berita', 'ApiController::index');
});

$routes->get('user/login', 'AuthController::loginuser');
$routes->post('user/login', 'AuthController::loginuser');
$routes->get('user/register', 'AuthController::registeruser');
$routes->get('user/logout', 'AuthController::logoutuser');

$routes->get('admin/login', 'AuthController::loginadmin');
$routes->post('admin/login', 'AuthController::loginadmin');
$routes->get('admin/logout', 'AuthController::logoutadmin');

$routes->get('seller/login', 'AuthController::loginseller');
$routes->post('seller/login', 'AuthController::loginseller');
$routes->get('seller/logout', 'AuthController::logoutseller');


$routes->get('user/dashboard', 'UserController::index', ['filter' => 'authuser']);


$routes->group('seller', function ($routes) {
    $routes->get('dashboard', 'SellerController::index', ['filter' => 'authuser']);
    $routes->get('laporan', 'SellerController::laporan', ['filter' => 'authuser']);
    $routes->get('profile', 'SellerController::profile', ['filter' => 'authuser']);

    $routes->get('produk', 'ProductController::index', ['filter' => 'authuser']);
    $routes->post('produk', 'ProductController::create', ['filter' => 'authuser']);
    $routes->post('produk/edit/(:any)', 'ProductController::edit/$1');
    $routes->get('produk/delete/(:any)', 'ProductController::delete/$1');
});




$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'AdminController::index', ['filter' => 'auth']);
    $routes->get('pengguna', 'AdminController::mpengguna', ['filter' => 'auth']);
    $routes->get('produk', 'AdminController::mproduk', ['filter' => 'auth']);
    $routes->get('laporan', 'AdminController::laporan', ['filter' => 'auth']);
    $routes->get('forum', 'AdminController::forum', ['filter' => 'auth']);
    $routes->get('berita', 'AdminController::berita', ['filter' => 'auth']);
    $routes->get('profile', 'AdminController::profile', ['filter' => 'auth']);
});
