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



//  /*
//  * --------------------------------------------------------------------
//  * router Untuk Halaman Toko

$routes->get('/', 'tokoController::index');
$routes->get('/link', 'tokoController::tokoLink');
$routes->get('/kaos', 'tokoController::kaos');
$routes->get('/konveksi', 'tokoController::konveksi');


//  * --------------------------------------------------------------------
//  */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'tokoController::index');
// $routes->get('/kaos', 'tokoController::kaos');
// $routes->get('/konveksi', 'tokoController::konveksi');
// $routes->get('/tokoLink', 'tokoController::tokoLink');
// $routes->get('/', 'loginController::index');

// register handling 
// $routes->get('/register', 'loginController::index');
// $routes->post('/register/process', 'loginController::process');
// $routes->get('/login', 'loginController::index');
// $routes->post('/loginProses', 'loginController::loginProses');
// $routes->get('/logout', 'loginController::logout');


// restAPI handling menggunakan library CI4 ------------------------------->
$routes->resource('APIController');

//  /*
//  * --------------------------------------------------------------------
//  * router Untuk admin Toko
$routes->get('/admin', 'adminController::index');
$routes->get('/adminKaos', 'adminController::adminKaos');
$routes->get('/adminKonveksi', 'adminController::adminKonveksi');
$routes->get('/adminToko', 'adminController::adminToko');

//  * router Untuk admin Toko pengelolaan halaman
$routes->get('/kelolaHalaman', 'adminController::kelolaHalaman');
$routes->post('/hapusHalaman', 'halamanController::hapusHalaman');
$routes->post('/getHalaman', 'halamanController::getHalaman');
$routes->get('/getHalamanAll', 'halamanController::getHalamanAll');
$routes->post('/updateHalaman', 'halamanController::updateHalaman');
$routes->post('/tambahHalaman', 'halamanController::tambahHalaman');
$routes->post('/validateHalaman', 'halamanController::validateHalaman');
$routes->post('/uploadCSVHalaman', 'halamanController::uploadCSVHalaman');
$routes->get('/cart', 'halamanController::cart');

//  * --------------------------------------------------------------------
//  */

// router untuk pengelolaan halaman produk ----------------------------------------------->
$routes->get('/adminProduk', 'adminController::adminProduk');
$routes->post('/hapusProduk', 'produkController::hapusProduk');
$routes->post('/getProduk', 'produkController::getProduk');
$routes->get('/getProdukAll', 'produkController::getProdukAll');
$routes->post('/updateProduk', 'produkController::updateProduk');
$routes->post('/tambahProduk', 'produkController::tambahProduk');
$routes->post('/validateProduk', 'produkController::validateProduk');
$routes->post('/uploadCSVProduk', 'produkController::uploadCSVProduk');
$routes->get('/cart', 'produkController::cart');


// router Untuk admin Toko pengelolaan halaman kaos ----------------------------------------------->
$routes->get('/adminStokKaos', 'adminController::adminStokKaos');
$routes->post('/adminStokKaos', 'adminController::adminStokKaos');
$routes->get('/getStokAll', 'stokController::getStokAll');
$routes->post('/hapusStok', 'stokController::hapusStok');
$routes->post('/getStok', 'stokController::getStok');
$routes->post('/updateStok', 'stokController::updateStok');
$routes->post('/tambahStok', 'stokController::tambahStok');
$routes->post('/validateStok', 'stokController::validateStok');
$routes->post('/uploadCSVStok', 'stokController::uploadCSVStok');
$routes->get('/cart', 'stokController::cart');




// router Untuk admin Toko pengelolaan halaman Penjualan ----------------------------------------------->
$routes->get('/catatanPenjualan', 'adminController::catatanPenjualan');
$routes->post('/catatanPenjualan', 'adminController::catatanPenjualan');
// $routes->post('/adminStokKaos', 'adminController::adminStokKaos');
$routes->post('/getPenjualan', 'penjualanController::getPenjualan');
$routes->get('/getPenjualanAll', 'penjualanController::gePenjualanAll');
$routes->post('/hapusPenjualan', 'penjualanController::hapusPenjualan');
$routes->post('/getPenjualan', 'penjualanController::getPenjualan');
$routes->post('/updatePenjualan', 'penjualanController::updatePenjualan');
$routes->post('/tambahPenjualan', 'penjualanController::tambahPenjualan');
$routes->post('/validatePenjualan', 'penjualanController::validatePenjualan');
$routes->post('/uploadCSVPenjualan', 'penjualanController::uploadCSVPenjualan');
$routes->get('/cart', 'penjualanController::cart');

// router Untuk admin Toko pengelolaan halaman Penjualan testing ----------------------------------------------->
$routes->get('/totalPenjualan', 'adminController::totalPenjualan');




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
