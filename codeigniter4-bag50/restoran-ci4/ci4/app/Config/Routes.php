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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('dashboard', 'Admin\Login::index');

//$routes->get('joni/(:any)', 'admin\kategori::selectWhere/$1');

$routes->group('admin', ['filter'=>'Auth'], function($routes){

    $routes->add('/','Admin\adminpage::index');

    $routes->add('kategori','Admin\kategori::read');
    $routes->add('kategori/create','Admin\kategori::create');
    $routes->add('kategori/find/(:any)','Admin\kategori::find/$1');
    $routes->add('kategori/delete/(:any)','Admin\kategori::delete/$1');
    $routes->add('kategori/insert','Admin\kategori::insert');
    $routes->add('kategori/update','Admin\kategori::update');

    $routes->add('menu','Admin\menu::index');
    $routes->add('menu/create','Admin\menu::create');
    $routes->add('menu/insert','Admin\menu::insert');
    $routes->add('menu/update','Admin\menu::update');
    $routes->add('menu/find/(:any)','Admin\menu::find/$1');
    $routes->add('menu/delete/(:any)','Admin\menu::delete/$1');

    $routes->add('pelanggan','Admin\pelanggan::index');
    $routes->add('pelanggan/update/(:any)','Admin\pelanggan::update/$1/$1');
    $routes->add('pelanggan/delete/(:any)','Admin\pelanggan::delete/$1');

    $routes->add('order','Admin\order::index');
    $routes->add('order/find/(:any)','Admin\order::find/$1');
    $routes->add('order/update','Admin\order::update');

    $routes->add('orderdetail','Admin\orderdetail::index');
    $routes->add('orderdetail/cari','Admin\orderdetail::cari');
    
    $routes->add('user','Admin\user::index');
    $routes->add('user/create','Admin\user::create');
    $routes->add('user/insert','Admin\user::insert');
    $routes->add('user/ubah','Admin\user::ubah');
    $routes->add('user/find/(:any)','Admin\user::find/$1');
    $routes->add('user/delete/(:any)','Admin\user::delete/$1');
    $routes->add('user/update/(:any)','Admin\user::update/$1/$1');

});

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
