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
$routes->setDefaultController('Dashboard');
$routes->setDefaultController('Dashboard');
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
$routes->set404Override(function ($message = null) {
    helper(['auth', 'app_helper']);
    if ($_SERVER['CI_ENVIRONMENT'] == 'production') {
        $message = 'Kemungkinan halaman telah dihapus, atau Anda salah menulis URL.';
    }
    return view('errors/error404', ['title' => 'Error 404', 'page' => 'error404', 'message' => $message]);
});

$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/profile', 'Profile::index');
$routes->post('/profile-edit', 'Profile::profileEdit');
$routes->post('/profile-edit-image', 'Profile::profileEditImage');
$routes->post('/profile-edit-password', 'Profile::profileEditPassword');

$routes->get('/pengguna', 'Pengguna::index', ['filter' => 'role:superadmin']);
$routes->get('/pengguna-add', 'Pengguna::addPengguna', ['filter' => 'role:superadmin']);
$routes->post('/pengguna-add', 'Pengguna::savePengguna', ['filter' => 'role:superadmin']);
$routes->get('/pengguna-edit/(:any)', 'Pengguna::editPengguna/$1', ['filter' => 'role:superadmin']);
$routes->post('/pengguna-edit', 'Pengguna::updatePengguna', ['filter' => 'role:superadmin']);
$routes->get('/pengguna-delete/(:any)', 'Pengguna::deletePengguna/$1', ['filter' => 'role:superadmin']);

$routes->get('/surat-masuk', 'SuratUmum::indexSuratMasuk', ['filter' => 'role:superadmin']);
$routes->get('/surat-keluar', 'SuratUmum::indexSuratKeluar', ['filter' => 'role:superadmin']);
$routes->get('/surat-masuk-all', 'SuratUmum::getAllSuratMasuk', ['filter' => 'role:superadmin']);
$routes->get('/surat-keluar-all', 'SuratUmum::getAllSuratKeluar', ['filter' => 'role:superadmin']);
$routes->get('/surat-masuk-add', 'SuratUmum::addSuratMasuk', ['filter' => 'role:superadmin']);
$routes->get('/surat-keluar-add', 'SuratUmum::addSuratKeluar', ['filter' => 'role:superadmin']);
$routes->get('/surat-keluar-add/(:any)', 'SuratUmum::addSuratKeluar/$1', ['filter' => 'role:superadmin']);
$routes->post('/surat-umum-add', 'SuratUmum::saveSuratUmum', ['filter' => 'role:superadmin']);
$routes->get('/surat-masuk-edit/(:any)', 'SuratUmum::editSuratUmum/$1', ['filter' => 'role:superadmin']);
$routes->get('/surat-keluar-edit/(:any)', 'SuratUmum::editSuratUmum/$1', ['filter' => 'role:superadmin']);
$routes->post('/surat-umum-edit', 'SuratUmum::updateSuratUmum', ['filter' => 'role:superadmin']);
$routes->get('/surat-umum-detail/(:any)', 'SuratUmum::detailSuratUmum/$1', ['filter' => 'role:superadmin']);
$routes->get('/surat-umum-delete/(:any)', 'SuratUmum::deleteSuratUmum/$1', ['filter' => 'role:superadmin']);

$routes->get('/surat-pasien', 'SuratPasien::index', ['filter' => 'role:superadmin,admin']);
$routes->get('/surat-pasien-all', 'SuratPasien::getAllSuratPasien', ['filter' => 'role:superadmin,admin']);
$routes->get('/surat-pasien-add', 'SuratPasien::addSuratPasien', ['filter' => 'role:superadmin,admin']);
$routes->post('/surat-pasien-add', 'SuratPasien::saveSuratPasien', ['filter' => 'role:superadmin,admin']);
$routes->get('/surat-pasien-edit/(:any)', 'SuratPasien::editSuratPasien/$1', ['filter' => 'role:superadmin,admin']);
$routes->post('/surat-pasien-edit', 'SuratPasien::updateSuratPasien', ['filter' => 'role:superadmin,admin']);
$routes->get('/surat-pasien-detail/(:any)', 'SuratPasien::detailSuratPasien/$1', ['filter' => 'role:superadmin,admin']);
$routes->get('/surat-pasien-delete/(:any)', 'SuratPasien::deleteSuratPasien/$1', ['filter' => 'role:superadmin,admin']);

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
