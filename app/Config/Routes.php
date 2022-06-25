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
// $routes->setDefaultController('Home');
$routes->setDefaultController('tokoController');
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
$routes->get('/', 'tokoController::index');
$routes->get('/kaos', 'tokoController::kaos');
$routes->get('/konveksi', 'tokoController::konveksi');
$routes->get('/tokoLink', 'tokoController::tokoLink');
// $routes->get('/', 'loginController::index');

// register handling 
$routes->get('/register', 'loginController::index');
$routes->post('/register/process', 'loginController::process');
$routes->get('/login', 'loginController::index');
$routes->post('/loginProses', 'loginController::loginProses');
$routes->get('/logout', 'loginController::logout');


// restAPI handling menggunakan library CI4 ------------------------------->
$routes->resource('APIController');


$routes->get('/admin', 'loginController::login_action');
$routes->get('/adminKaos', 'adminController::adminKaos');
$routes->get('/adminKonveksi', 'adminController::adminKonveksi');
$routes->get('/toko', 'tokoController::index');
$routes->get('/produk', 'produkController::index');
$routes->get('/adminToko', 'adminController::adminToko');
$routes->get('/admin', 'adminController::index');

// router untuk pengelolaan halaman produk ----------------------------------------------->
$routes->post('/hapusProduk', 'produkController::hapusProduk');
$routes->post('/getProduk', 'produkController::getProduk');
$routes->get('/getProdukAll', 'produkController::getProdukAll');
$routes->post('/updateProduk', 'produkController::updateProduk');
$routes->post('/tambahProduk', 'produkController::tambahProduk');
$routes->post('/validateProduk', 'produkController::validateProduk');
$routes->post('/uploadCSVProduk', 'produkController::uploadCSVProduk');
$routes->get('/cart', 'produkController::cart');


// router untuk pengelolaan halaman kaos ----------------------------------------------->
$routes->post('/hapusKaos', 'kaosController::hapusKaos');
$routes->post('/getKaos', 'kaosController::getKaos');
$routes->get('/getKaosAll', 'kaosController::getKaosAll');
$routes->post('/updateKaos', 'kaosController::updateKaos');
$routes->post('/tambahKaos', 'kaosController::tambahKaos');
$routes->post('/validateKaos', 'kaosController::validateKaos');
$routes->post('/uploadCSVKaos', 'kaosController::uploadCSVKaos');
$routes->get('/cart', 'kaosController::cart');


$routes->get('/toko/galery', 'tokoController::galery');


$routes->get('/shoping', 'halamanShopingController::index');


$routes->get('/kelolaHalaman', 'adminController::kelolaHalaman');


// $routes->get('/', 'loginController::index');

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
