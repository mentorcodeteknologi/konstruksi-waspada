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
$routes->get('/blog_details/(:any)', 'HomeController::blog_details/$1');
$routes->post('/blog_details/(:any)', 'HomeController::blog_comment/$1', ['filter' => 'auth:users,admin']);

// AUTH ROUTES
$routes->get('/login', 'AuthController::indexLogin');
$routes->post('/login', 'AuthController::login'); //proses form login
$routes->get('/register', 'AuthController::indexRegister');
$routes->get('/verifyEmail/(:any)', 'AuthController::verifyEmail/$1');
$routes->post('/register', 'AuthController::register'); //proses form register
$routes->get('/logout', 'AuthController::logout');

// USER BLACKLIST FRONTEND ROUTES
$routes->get('/user_blacklist_frontend', 'UserBlacklistFrontendController::index');
$routes->post('/createUserPerusahaanBlacklist', 'UserBlacklistFrontendController::createPerusahaanBlacklist');
$routes->post('/createUserPeroranganBlacklist', 'UserBlacklistFrontendController::createUserBlacklist');

// ALAT HILANG ROUTES
$routes->get('alat_hilang/detail', 'AlatHilangFrontendController::index');
$routes->post('alat_hilang/createAlatHilang', 'AlatHilangFrontendController::createAlatHilang');


// DASHBOARD ROUTES
$routes->get('/404', 'DashboardController::pageNotFound');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth:users,admin']);
$routes->get('/websocket', 'WebsocketController::index');


// ROUTES OTP
$routes->group('otp', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'AuthController::otp');
    $routes->post('(:any)', 'AuthController::verifyOtpLogin/$1');
});


// ROUTES USERS
$routes->group('users', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('', 'UsersController::index');
    $routes->get('create', 'UsersController::create');
    $routes->post('create', 'UsersController::createUser');
    $routes->get('update/(:any)', 'UsersController::update/$1');
    $routes->post('update/(:any)', 'UsersController::updateUsers/$1');
    $routes->get('edit-profile/(:any)', 'UsersController::edit/$1');
    $routes->post('edit-profile/(:any)', 'UsersController::editProfile/$1');
});


// ROUTES ARTIKEL
$routes->group('artikel', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'ArtikelController::index');
    $routes->get('create', 'ArtikelController::create');
    $routes->post('create', 'ArtikelController::createArtikel');
    $routes->get('update/(:any)', 'ArtikelController::update/$1');
    $routes->post('update/(:any)', 'ArtikelController::updateArtikel/$1');
    $routes->post('delete/(:any)', 'ArtikelController::delete/$1');
});
$routes->get('updateLikes', 'ArtikelController::updateLikes');

// ROUTES KALENDER
$routes->group('category', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'CategoryController::index');
    $routes->get('create', 'CategoryController::create');
    $routes->post('create', 'CategoryController::createCategory');
    $routes->get('update/(:any)', 'CategoryController::update/$1');
    $routes->post('update/(:any)', 'CategoryController::updateCategory/$1');
    $routes->post('delete/(:any)', 'CategoryController::delete/$1');
});
// ROUTES KALENDER
$routes->group('calendar', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'CalendarController::index');
    $routes->get('create', 'CalendarController::create');
    $routes->post('create', 'CalendarController::createCalendar');
    $routes->get('update/(:any)', 'CalendarController::update/$1');
    $routes->post('update/(:any)', 'CalendarController::updateCalendar/$1');
    $routes->post('delete/(:any)', 'CalendarController::delete/$1');
});
$routes->get('calendar_frontend', 'CalendarController::indexFront');
$routes->get('calendar_data', 'CalendarController::calendar_data');


// ROUTES ALAT HILANG
$routes->group('alat_hilang', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'AlatHilangController::index');
    $routes->get('create', 'AlatHilangController::create');
    $routes->post('create', 'AlatHilangController::createAlatHilang');
    $routes->get('update/(:any)', 'AlatHilangController::update/$1');
    $routes->post('update/(:any)', 'AlatHilangController::updateAlatHilang/$1');
    $routes->post('delete/(:any)', 'AlatHilangController::delete/$1');
    $routes->post('validation/(:any)', 'AlatHilangController::validation/$1');
    $routes->post('notvalid/(:any)', 'AlatHilangController::notValid/$1');
});


// ROUTES USER BLACKLIST
$routes->group('user_blacklist', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'UserBlacklistController::index');
    $routes->get('create', 'UserBlacklistController::create');
    $routes->post('create', 'UserBlacklistController::createUserBlacklist');
    $routes->get('update/(:any)', 'UserBlacklistController::update/$1');
    $routes->post('update/(:any)', 'UserBlacklistController::updateUserBlacklist/$1');
    $routes->post('delete/(:any)', 'UserBlacklistController::delete/$1');
    $routes->get('detail/(:any)', 'UserBlacklistController::detail/$1');
    $routes->post('validation/(:any)', 'UserBlacklistController::validation/$1');
    $routes->post('tidakvalid/(:any)', 'UserBlacklistController::tidakValid/$1');
});


// ROUTES PERUSAHAAN BLACKLIST
$routes->group('perusahaan_blacklist', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'PerusahaanBlacklistController::index');
    $routes->get('create', 'PerusahaanBlacklistController::create');
    $routes->post('create', 'PerusahaanBlacklistController::createPerusahaanBlacklist');
    $routes->get('update/(:any)', 'PerusahaanBlacklistController::update/$1');
    $routes->post('update/(:any)', 'PerusahaanBlacklistController::updatePerusahaanBlacklist/$1');
    $routes->post('delete/(:any)', 'PerusahaanBlacklistController::delete/$1');
    $routes->get('detail/(:any)', 'PerusahaanBlacklistController::detail/$1');
    $routes->post('validation/(:any)', 'PerusahaanBlacklistController::validation/$1');
});


// ROUTES WHATSAPP SCAN QR
$routes->get('/scan_qr', 'WhatsappController::index', ['filter' => 'auth:admin']);


// ROUTES PEMBAYARAN
$routes->group('pembayaran', ['filter' => 'auth:users,admin'], function ($routes) {
    $routes->get('', 'PembayaranController::index');
    $routes->get('create', 'PembayaranController::create');
    $routes->post('create', 'PembayaranController::createPembayaran');
    $routes->post('validasi/(:any)', 'PembayaranController::validasiPembayaran/$1');
    $routes->post('tidakvalid/(:any)', 'PembayaranController::tidakValid/$1');
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
