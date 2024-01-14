<?php

use App\Controllers\OrgStructure\DivisionController;
use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */

//$routes->setAutoRoute(true);
$routes->get('/', 'Home::index', ['as' => 'ldm.dashboard']);

$routes->get('divisions/', [DivisionController::class, 'index'], ['as' => 'ldm.divisions']);
$routes->post('divisions/create', [DivisionController::class, 'create'], ['as' => 'ldm.divisions.create']);


