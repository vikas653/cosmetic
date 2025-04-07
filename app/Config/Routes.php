<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/about', 'Home::aboutus'); 
$routes->get('home/contact', 'Home::contactus'); 
$route['home/product_filter'] = 'home/product_filter';
$routes->setAutoRoute(true);







?>
