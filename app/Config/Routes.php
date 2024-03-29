<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->group('', ['filter' => 'login'], function ($routes) {

    $routes->get('/', 'Home::index');
    $routes->get('/prakon/kamus', 'Prakon::kamus');
    $routes->get('/detail/(:any)', 'Prakon::detail/$1');
    $routes->get('/prakon/hapus1/(:any)', 'Prakon::hapus1/$1');
    $routes->get('/statistisi/document', 'Statistisi::index');
    $routes->get('/prakon/index/(:any)', 'Prakon::index/$1');
    $routes->get('/statistisi/index/(:any)', 'Prakon::index/$1');
    $routes->get('/statistisi/hapusdoc/(:any)', 'Statistisi::hapusdoc/$1');
    $routes->get('/kamusprakom/hapus/(:any)', 'Kamusprakom::hapus/$1');
    $routes->get('/kamusstatistisi/hapus/(:any)', 'Kamusstatistisi::hapus/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
