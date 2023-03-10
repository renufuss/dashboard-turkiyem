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
$routes->addRedirect('/', 'dashboard');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard/table', 'Dashboard::showTable');


$routes->get('/satuan', 'Unit::index', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/satuan/table', 'Unit::showTable', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/satuan/modal', 'Unit::showModal', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/satuan/save', 'Unit::save', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/satuan/confirm', 'Unit::confirmDelete', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/satuan/delete', 'Unit::deleteUnit', ['filter' => 'role:Super Admin, Gudang']);

$routes->get('/barang', 'Item::index');
$routes->post('/barang/table', 'Item::showTable');
$routes->post('/barang/modal', 'Item::showModal', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/barang/save', 'Item::save', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/barang/confirm', 'Item::confirmDelete', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/barang/delete', 'Item::deleteItem', ['filter' => 'role:Super Admin, Gudang']);

$routes->get('/stock/tambah', 'Item::showModalAddStock', ['filter' => 'role:Super Admin, Gudang']);
$routes->get('/stock/kurang', 'Item::showModalMinusStock');
$routes->post('/stock/current', 'Item::showCurrentStock');
$routes->post('/stock/add', 'Item::addStock', ['filter' => 'role:Super Admin, Gudang']);
$routes->post('/stock/minus', 'Item::minusStock');

$routes->get('/laporan', 'Report::index');
$routes->post('/laporan/table', 'Report::showTable');
$routes->post('/laporan/export', 'Report::exportToExcel', ['filter' => 'role:Super Admin, Gudang']);

$routes->get('/pengguna', 'User::index', ['filter' => 'role:Super Admin']);
$routes->post('/pengguna/table', 'User::showTable', ['filter' => 'role:Super Admin']);
$routes->post('/pengguna/save', 'User::save', ['filter' => 'role:Super Admin']);
$routes->post('/pengguna/confirm', 'User::confirmDelete', ['filter' => 'role:Super Admin']);
$routes->post('/pengguna/delete', 'User::deleteUser', ['filter' => 'role:Super Admin']);

$routes->get('/profile', 'User::myProfile');
$routes->get('/profile/setting', 'User::setMyProfile');
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
