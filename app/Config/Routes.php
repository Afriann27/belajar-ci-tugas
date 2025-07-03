<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman utama
$routes->get('/', 'Home::index', ['filter' => 'auth']);

// Auth routes
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

// Produk
$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->post('download', 'ProdukController::download');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});
// Kategori
$routes->group('kategori', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'KategoriController::index');
    $routes->post('', 'KategoriController::create'); 
    $routes->post('edit/(:num)', 'KategoriController::edit/$1');
    $routes->get('delete/(:num)', 'KategoriController::delete/$1');
});

// Keranjang
$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth', 'as' => 'keranjang']);
$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);

// diskon
$routes->get('/diskon/create', 'DiskonController::create');
$routes->post('/diskon/save', 'DiskonController::save');
$routes->get('/diskon/edit/(:num)', 'DiskonController::edit/$1');
$routes->post('/diskon/update/(:num)', 'DiskonController::update/$1');
$routes->get('/diskon/delete/(:num)', 'DiskonController::delete/$1');
$routes->get('/diskon/form', 'DiskonController::form', ['filter' => 'role:admin']);
$routes->get('/diskon/form/(:num)', 'DiskonController::form/$1', ['filter' => 'role:admin']);

$routes->get('/keranjang', 'KeranjangController::index');
$routes->post('/keranjang/add', 'KeranjangController::add');
$routes->post('/keranjang/edit', 'KeranjangController::edit');
$routes->get('/keranjang/delete/(:any)', 'KeranjangController::delete/$1');
$routes->get('/keranjang/clear', 'KeranjangController::clear');
$routes->get('transaksi/selesaikan/(:num)', 'TransaksiController::selesaikan/$1');

$routes->post('/api/status/selesai/(:num)', 'ApiController::setSelesai/$1');

//rolefilter
$routes->get('/diskon', 'DiskonController::index');



$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);

$routes->resource('api', ['controller' => 'apiController']);
