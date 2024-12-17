<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');

// Auth Routes
$routes->get('login', 'Auth::login', ['as' => 'login']);
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout', ['as' => 'logout']);

$routes->group('api', function($routes) {
    $routes->post('login', 'Api\AuthController::login');
    $routes->post('register', 'Api\AuthController::register');
});
// Protected Admin Routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    // Dashboard
    $routes->get('/', 'Admin\Dashboard::index', ['as' => 'admin.dashboard']);
    
    // Users Management
    $routes->group('users', function($routes) {
        $routes->get('/', 'Admin\Users::index', ['as' => 'admin.users.index']);
        $routes->get('create', 'Admin\Users::create', ['as' => 'admin.users.create']);
        $routes->post('store', 'Admin\Users::store', ['as' => 'admin.users.store']);
        $routes->get('edit/(:num)', 'Admin\Users::edit/$1', ['as' => 'admin.users.edit']);
        $routes->post('update/(:num)', 'Admin\Users::update/$1', ['as' => 'admin.users.update']);
        $routes->get('delete/(:num)', 'Admin\Users::delete/$1', ['as' => 'admin.users.delete']);
    });
    
    // Sliders Management
    $routes->group('sliders', function($routes) {
        $routes->get('/', 'Admin\Sliders::index', ['as' => 'admin.sliders.index']);
        $routes->get('create', 'Admin\Sliders::create', ['as' => 'admin.sliders.create']);
        $routes->post('store', 'Admin\Sliders::store', ['as' => 'admin.sliders.store']);
        $routes->get('edit/(:num)', 'Admin\Sliders::edit/$1', ['as' => 'admin.sliders.edit']);
        $routes->post('update/(:num)', 'Admin\Sliders::update/$1', ['as' => 'admin.sliders.update']);
        $routes->get('delete/(:num)', 'Admin\Sliders::delete/$1', ['as' => 'admin.sliders.delete']);
    });
    
    // Sponsors Management
    $routes->group('sponsors', function($routes) {
        $routes->get('/', 'Admin\Sponsors::index', ['as' => 'admin.sponsors.index']);
        $routes->get('create', 'Admin\Sponsors::create', ['as' => 'admin.sponsors.create']);
        $routes->post('store', 'Admin\Sponsors::store', ['as' => 'admin.sponsors.store']);
        $routes->get('edit/(:num)', 'Admin\Sponsors::edit/$1', ['as' => 'admin.sponsors.edit']);
        $routes->post('update/(:num)', 'Admin\Sponsors::update/$1', ['as' => 'admin.sponsors.update']);
        $routes->get('delete/(:num)', 'Admin\Sponsors::delete/$1', ['as' => 'admin.sponsors.delete']);
    });
    
    // Contacts Management
    $routes->group('contacts', function($routes) {
        $routes->get('/', 'Admin\Contacts::index', ['as' => 'admin.contacts.index']);
        $routes->get('show/(:num)', 'Admin\Contacts::show/$1', ['as' => 'admin.contacts.show']);
        $routes->post('update-status/(:num)', 'Admin\Contacts::updateStatus/$1', ['as' => 'admin.contacts.update-status']);
        $routes->get('delete/(:num)', 'Admin\Contacts::delete/$1', ['as' => 'admin.contacts.delete']);
    });
    
    // Clients Management
    $routes->group('clients', function($routes) {
        $routes->get('/', 'Admin\Clients::index', ['as' => 'admin.clients.index']);
        $routes->get('create', 'Admin\Clients::create', ['as' => 'admin.clients.create']);
        $routes->post('store', 'Admin\Clients::store', ['as' => 'admin.clients.store']);
        $routes->get('edit/(:num)', 'Admin\Clients::edit/$1', ['as' => 'admin.clients.edit']);
        $routes->post('update/(:num)', 'Admin\Clients::update/$1', ['as' => 'admin.clients.update']);
        $routes->get('delete/(:num)', 'Admin\Clients::delete/$1', ['as' => 'admin.clients.delete']);
    });
    
    // Projects Management
    $routes->group('projects', function($routes) {
        $routes->get('/', 'Admin\Projects::index', ['as' => 'admin.projects.index']);
        $routes->get('create', 'Admin\Projects::create', ['as' => 'admin.projects.create']);
        $routes->post('store', 'Admin\Projects::store', ['as' => 'admin.projects.store']);
        $routes->get('edit/(:num)', 'Admin\Projects::edit/$1', ['as' => 'admin.projects.edit']);
        $routes->post('update/(:num)', 'Admin\Projects::update/$1', ['as' => 'admin.projects.update']);
        $routes->get('delete/(:num)', 'Admin\Projects::delete/$1', ['as' => 'admin.projects.delete']);
    });
    
    // Blog Categories Management
    $routes->group('blog-categories', function($routes) {
        $routes->get('/', 'Admin\BlogCategories::index', ['as' => 'admin.blog-categories.index']);
        $routes->get('create', 'Admin\BlogCategories::create', ['as' => 'admin.blog-categories.create']);
        $routes->post('store', 'Admin\BlogCategories::store', ['as' => 'admin.blog-categories.store']);
        $routes->get('edit/(:num)', 'Admin\BlogCategories::edit/$1', ['as' => 'admin.blog-categories.edit']);
        $routes->post('update/(:num)', 'Admin\BlogCategories::update/$1', ['as' => 'admin.blog-categories.update']);
        $routes->get('delete/(:num)', 'Admin\BlogCategories::delete/$1', ['as' => 'admin.blog-categories.delete']);
    });
    
    // Blog Tags Management
    $routes->group('blog-tags', function($routes) {
        $routes->get('/', 'Admin\BlogTags::index', ['as' => 'admin.blog-tags.index']);
        $routes->get('create', 'Admin\BlogTags::create', ['as' => 'admin.blog-tags.create']);
        $routes->post('store', 'Admin\BlogTags::store', ['as' => 'admin.blog-tags.store']);
        $routes->get('edit/(:num)', 'Admin\BlogTags::edit/$1', ['as' => 'admin.blog-tags.edit']);
        $routes->post('update/(:num)', 'Admin\BlogTags::update/$1', ['as' => 'admin.blog-tags.update']);
        $routes->get('delete/(:num)', 'Admin\BlogTags::delete/$1', ['as' => 'admin.blog-tags.delete']);
    });
    
    // Blogs Management
    $routes->group('blogs', function($routes) {
        $routes->get('/', 'Admin\Blogs::index', ['as' => 'admin.blogs.index']);
        $routes->get('create', 'Admin\Blogs::create', ['as' => 'admin.blogs.create']);
        $routes->post('store', 'Admin\Blogs::store', ['as' => 'admin.blogs.store']);
        $routes->get('edit/(:num)', 'Admin\Blogs::edit/$1', ['as' => 'admin.blogs.edit']);
        $routes->post('update/(:num)', 'Admin\Blogs::update/$1', ['as' => 'admin.blogs.update']);
        $routes->get('delete/(:num)', 'Admin\Blogs::delete/$1', ['as' => 'admin.blogs.delete']);
    });
});