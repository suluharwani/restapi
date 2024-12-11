<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

// Documentation Route
$routes->get('docs', 'DocsController::index');

// Public Auth Routes
$routes->group('api', function($routes) {
    $routes->post('login', 'Api\AuthController::login');
    $routes->post('register', 'Api\AuthController::register');
});

// Protected API Routes
$routes->group('api', ['filter' => 'auth'], function($routes) {
    // User Management Routes
    $routes->group('users', function($routes) {
        $routes->get('/', 'Api\UserController::index');
        $routes->post('/', 'Api\UserController::create');
        $routes->get('(:num)', 'Api\UserController::show/$1');
        $routes->put('(:num)', 'Api\UserController::update/$1');
        $routes->delete('(:num)', 'Api\UserController::delete/$1');
    });

    // Slider Routes
    $routes->group('sliders', function($routes) {
        $routes->get('/', 'Api\SliderController::index');
        $routes->post('/', 'Api\SliderController::create');
        $routes->get('(:num)', 'Api\SliderController::show/$1');
        $routes->put('(:num)', 'Api\SliderController::update/$1');
        $routes->delete('(:num)', 'Api\SliderController::delete/$1');
    });

    // Sponsor Routes
    $routes->group('sponsors', function($routes) {
        $routes->get('/', 'Api\SponsorController::index');
        $routes->post('/', 'Api\SponsorController::create');
        $routes->get('(:num)', 'Api\SponsorController::show/$1');
        $routes->put('(:num)', 'Api\SponsorController::update/$1');
        $routes->delete('(:num)', 'Api\SponsorController::delete/$1');
    });

    // Contact Routes
    $routes->group('contacts', function($routes) {
        $routes->get('/', 'Api\ContactController::index');
        $routes->post('/', 'Api\ContactController::create');
        $routes->get('(:num)', 'Api\ContactController::show/$1');
        $routes->put('(:num)', 'Api\ContactController::update/$1');
        $routes->delete('(:num)', 'Api\ContactController::delete/$1');
    });

    // Client Routes
    $routes->group('clients', function($routes) {
        $routes->get('/', 'Api\ClientController::index');
        $routes->post('/', 'Api\ClientController::create');
        $routes->get('(:num)', 'Api\ClientController::show/$1');
        $routes->put('(:num)', 'Api\ClientController::update/$1');
        $routes->delete('(:num)', 'Api\ClientController::delete/$1');
    });

    // Project Routes
    $routes->group('projects', function($routes) {
        $routes->get('/', 'Api\ProjectController::index');
        $routes->post('/', 'Api\ProjectController::create');
        $routes->get('(:num)', 'Api\ProjectController::show/$1');
        $routes->put('(:num)', 'Api\ProjectController::update/$1');
        $routes->delete('(:num)', 'Api\ProjectController::delete/$1');
    });

    // Blog Routes
    $routes->group('blogs', function($routes) {
        $routes->get('/', 'Api\BlogController::index');
        $routes->post('/', 'Api\BlogController::create');
        $routes->get('(:num)', 'Api\BlogController::show/$1');
        $routes->put('(:num)', 'Api\BlogController::update/$1');
        $routes->delete('(:num)', 'Api\BlogController::delete/$1');
    });
});