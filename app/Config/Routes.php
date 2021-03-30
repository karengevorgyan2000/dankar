<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(false);
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/test', 'Home::test');
$routes->add('login', 'Auth\AuthController::index');
$routes->add('donate', 'DonateController::index');
$routes->get('/payment/response', 'ReviewController::index');
$routes->post('login/doLogin', 'Auth\AuthController::doLogin');
$routes->post('mail', 'ContactController::mail');







 

$routes->group('admin', ['filter' => 'isAdminLoggedIn'], function($routes){
    $routes->add('blog', 'Admin\BlogController::index',);
    $routes->add('messages', 'Admin\MessagesController::index');
    $routes->add('messages/list', 'Admin\MessagesController::list');
    $routes->post('sendmail', 'Admin\MessagesController::sendMail');
    $routes->get('home', 'Admin\HomeController::index' );
    $routes->get('transactions', 'Admin\TransactionsController::index' );
    $routes->post('transactions/list', 'Admin\TransactionsController::list' );
    
    $routes->add('logout', 'Auth\AuthController::logOut' );
    $routes->add('about-us', 'Admin\AboutusController::index' );
    $routes->post('about-us/add', 'Admin\AboutusController::add' );
    
        $routes->group('blog', function($routes) {
            $routes->post('add/(:num)/(:num)', 'Admin\BlogController::store/$1/$2' );
            $routes->post('list', 'Admin\BlogController::list' );
            $routes->delete('delete/(:num)', 'Admin\BlogController::delete/$1' );
            $routes->put('update-status/(:num)/(:segment)', 'Admin\BlogController::updateStatus/$1/$2' );
            $routes->get('show/(:num)', 'Admin\BlogController::show/$1' );
        });
        $routes->group('home', function($routes) {
            $routes->post('add', 'Admin\HomeController::store' );
            $routes->post('slide_list', 'Admin\HomeController::slideList' );
            $routes->delete('delete/(:num)', 'Admin\HomeController::delete/$1' );
            $routes->put('update-status/(:num)/(:segment)', 'Admin\HomeController::updateStatus/$1/$2' );
            $routes->get('show/(:num)', 'Admin\HomeController::show/$1' );
            $routes->put('edit/(:num)', 'Admin\HomeController::edit/$1' );
        });
 });
    


/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
