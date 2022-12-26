<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/satuan', 'Unit::index');
$routes->post('/satuan/table', 'Unit::showTable');
$routes->post('/satuan/modal', 'Unit::showModal');
$routes->post('/satuan/save', 'Unit::save');
$routes->post('/satuan/confirm', 'Unit::confirmDelete');
$routes->post('/satuan/delete', 'Unit::deleteUnit');

$routes->get('/barang', 'Item::index');
$routes->post('/barang/table', 'Item::showTable');
$routes->post('/barang/modal', 'Item::showModal');
$routes->post('/barang/save', 'Item::save');
$routes->post('/barang/confirm', 'Item::confirmDelete');
$routes->post('/barang/delete', 'Item::deleteItem');

$routes->get('/stock/tambah', 'Item::showModalAddStock');
$routes->get('/stock/kurang', 'Item::showModalMinusStock');
$routes->post('/stock/current', 'Item::showCurrentStock');
$routes->post('/stock/add', 'Item::addStock');
$routes->post('/stock/minus', 'Item::minusStock');

$routes->get('/laporan', 'Report::index');
$routes->post('/laporan/table', 'Report::showTable');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
