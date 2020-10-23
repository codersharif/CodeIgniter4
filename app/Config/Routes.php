<?php namespace Config;

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
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/project', 'ProjectController::index');
$routes->get('/project/about', 'ProjectController::show');
$routes->get('/call/(:any)/(:num)', 'ProjectController::call/$1/$2');
$routes->get('/quary-prag', 'ProjectController::queryPrag');

$routes->get('/insert-query','ProjectController::insertQuery');
$routes->get('/update-query','ProjectController::updateQuery');
$routes->get('/delete','ProjectController::delete');
$routes->get('/select','ProjectController::select');
$routes->get('/data-list-2','ProjectController::dataList2');

//insert
$routes->get('/data-insert','ProjectController::insert2');
$routes->get('/data-delete-2','ProjectController::delete2');
$routes->get('/data-update-2','ProjectController::update2');

//models
$routes->get('/data-list-3','ProjectController::dataList3');
$routes->get('/data-insert-3','ProjectController::insert3');
$routes->get('/data-update-3','ProjectController::update3');
$routes->get('/data-delete-3','ProjectController::delete3');

//form
$routes->match(['get','post'],'/form','ProjectController::form');

//helper function

$routes->get('/helper','ProjectController::helper');

// paginate
$routes->get('/paginate','ProjectController::paginate');

//session 

$routes->get('/user-session','ProjectController::userSession');

$routes->match(['get','post'],'/file-upload','ProjectController::fileUpload');
$routes->get('/ajax-request','ProjectController::ajaxMethod');
$routes->post('/ajax-response','ProjectController::ajaxResponse');


/**
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
