<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/search', 'Home::search');
$routes->get('details/(:num)', 'Home::details/$1');
$routes->post('updateOverview', 'Home::update');