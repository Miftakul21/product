<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->resource('produk');
$routes->resource('kategori');
$routes->resource('status');

$routes->get('/data/(:any)', 'Produk::getProduk/$1');

$routes->get('/', 'Home::index');