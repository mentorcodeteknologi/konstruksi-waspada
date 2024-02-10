<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// HOME ROUTES
$routes->get('/', 'HomeController::index');

// DASHBOARD ROUTES
$routes->get('/dashboard', 'DashboardController::index');

// ROUTES USERS
$routes->group('users', function ($routes) {
    $routes->get('', 'UsersController::index');
    $routes->get('create', 'UsersController::create');
    $routes->post('create', 'UsersController::createUser');
    $routes->get('update/(:any)', 'UsersController::update/$1');
    $routes->post('update/(:any)', 'UsersController::updateUsers/$1');
});

// ROUTES ARTIKEL
$routes->group('artikel', function ($routes) {
    $routes->get('', 'ArtikelController::index');
    $routes->get('create', 'ArtikelController::create');
    $routes->post('create', 'ArtikelController::createArtikel');
    $routes->get('update/(:any)', 'ArtikelController::update/$1');
    $routes->post('update/(:any)', 'ArtikelController::updateArtikel/$1');
    $routes->post('delete/(:any)', 'ArtikelController::delete/$1');
});

// ROUTES ALAT HILANG
$routes->group('alat_hilang', function ($routes) {
    $routes->get('', 'AlatHilangController::index');
    $routes->get('create', 'AlatHilangController::create');
    $routes->post('create', 'AlatHilangController::createAlatHilang');
    $routes->get('update/(:any)', 'AlatHilangController::update/$1');
    $routes->post('update/(:any)', 'AlatHilangController::updateAlatHilang/$1');
    $routes->post('delete/(:any)', 'AlatHilangController::delete/$1');
});


// ROUTES USER BLACKLIST
$routes->group('user_blacklist', function ($routes) {
    $routes->get('', 'UserBacklistController::index');
    $routes->get('create', 'UserBacklistController::create');
    $routes->post('create', 'UserBacklistController::createUserBacklist');
    $routes->get('update/(:any)', 'UserBacklistController::update/$1');
    $routes->post('update/(:any)', 'UserBacklistController::updateUserBacklist/$1');
    $routes->post('delete/(:any)', 'UserBacklistController::delete/$1');
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
