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
$routes->get('login', 'Login::index',['filter'=>'noauth']);
$routes->add('login', 'Login::login',['filter'=>'noauth']);
$routes->get('logout', 'Login::logout',['filter'=>'auth']);
$routes->get('register', 'Register::index',['filter'=>'noauth']);
$routes->add('register', 'Register::post',['filter'=>'noauth']);

$routes->get('/', 'Home::index',['filter'=>'auth']);
$routes->get('capaian', 'Capaian::index',['filter'=>'auth']);
$routes->get('pengaturan', 'Pengaturan::index',['filter'=>'auth']);
$routes->add('pengaturan', 'Pengaturan::store',['filter'=>'auth']);
$routes->get('akun', 'Akun::index',['filter'=>'auth']);
$routes->add('akun', 'Akun::store',['filter'=>'auth']);

// SIswa
$routes->get('pelajaran/(:num)', 'Pelajaran::index/$1',['filter'=>'auth']);
$routes->add('pelajaranstep', 'Pelajaran::step',['filter'=>'auth']);
$routes->get('pelajaranmateri/(:num)', 'PelajaranMateri::index/$1',['filter'=>'auth']);
$routes->get('pelajaranquiz/(:num)', 'PelajaranQuiz::index/$1',['filter'=>'auth']);
$routes->add('pelajaranquiz/(:num)', 'PelajaranQuiz::store/$1',['filter'=>'auth']);



// Guru
$routes->get('buka-kelas', 'BukaKelas::index',['filter'=>'auth']);

$routes->get('materikurikulum', 'KurikulumMateri::index',['filter'=>'auth']);
$routes->get('materikurikulum/edit/(:any)', 'KurikulumMateri::edit/$1',['filter'=>'auth']);
$routes->add('materikurikulum', 'KurikulumMateri::store',['filter'=>'auth']);
$routes->add('materikurikulum/(:num)', 'KurikulumMateri::update/$1',['filter'=>'auth']);
$routes->get('materikurikulum/create', 'KurikulumMateri::create',['filter'=>'auth']);

$routes->get('materikurikulum/(:num)', 'KurikulumMateri::view/$1',['filter'=>'auth']);
$routes->get('kurikulummateri/create/(:num)', 'KurikulumMateri::create_materi/$1',['filter'=>'auth']);
$routes->add('kurikulummateri', 'KurikulumMateri::store_materi',['filter'=>'auth']);

$routes->get('kurikulumquiz/create/(:num)', 'KurikulumMateri::create_quiz/$1',['filter'=>'auth']);
$routes->add('kurikulumquiz', 'KurikulumMateri::store_quiz',['filter'=>'auth']);
$routes->get('kurikulumquiz/edit/(:num)', 'KurikulumMateri::edit_quiz/$1',['filter'=>'auth']);
$routes->add('kurikulumquiz/update/(:num)', 'KurikulumMateri::update_quiz/$1',['filter'=>'auth']);
$routes->get('kurikulumquiz/delete/(:num)', 'KurikulumMateri::delete_quiz/$1',['filter'=>'auth']);

$routes->get('kurikulummateri/edit/(:num)', 'KurikulumMateri::edit_materi/$1',['filter'=>'auth']);
$routes->get('kurikulummateri/delete/(:num)', 'KurikulumMateri::delete_materi/$1',['filter'=>'auth']);
$routes->add('kurikulummateri/update/(:num)', 'KurikulumMateri::update_materi/$1',['filter'=>'auth']);



$routes->get('kurikulum', 'Kurikulum::index',['filter'=>'auth']);
$routes->add('kurikulum', 'Kurikulum::store',['filter'=>'auth']);
$routes->get('kurikulum/(:num)', 'Kurikulum::edit/$1',['filter'=>'auth']);
$routes->add('kurikulum/(:num)', 'Kurikulum::update/$1',['filter'=>'auth']);
$routes->get('kurikulum/create', 'Kurikulum::create',['filter'=>'auth']);

$routes->get('capaiansiswa', 'CapaianSiswa::index',['filter'=>'auth']);
$routes->get('capaiansiswa/(:num)', 'CapaianSiswa::create/$1',['filter'=>'auth']);
$routes->add('capaiansiswa/(:num)', 'CapaianSiswa::store/$1',['filter'=>'auth']);




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
