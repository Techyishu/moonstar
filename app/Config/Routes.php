<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
 * --------------------------------------------------------------------
 * Moonstar School Management System - Route Configuration
 * --------------------------------------------------------------------
 */

// Public Website Routes
$routes->get('/', 'PublicHome::index');
$routes->get('about', 'About::index');
$routes->get('toppers', 'Toppers::index');
$routes->get('staff', 'Staff::index');

// Admissions Routes
$routes->get('admissions', 'Admissions::index');
$routes->post('admissions/submit', 'Admissions::submit');

// Gallery Route
$routes->get('gallery', 'Gallery::index');

// Contact Routes
$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');

// School Leaving Certificate
$routes->get('slc', 'SchoolLeavingCertificate::index');

// Dynamic Pages (from database)
$routes->get('page/(:segment)', 'Pages::view/$1');

/*
 * --------------------------------------------------------------------
 * Admin Area Routes (Protected by Auth Middleware)
 * --------------------------------------------------------------------
 */

// Admin Authentication (No middleware)
$routes->addRedirect('admin', 'admin/login');
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::attemptLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Routes (Protected)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Notices Management
    $routes->get('notices', 'Admin\Notices::index');
    $routes->get('notices/create', 'Admin\Notices::create');
    $routes->post('notices/store', 'Admin\Notices::store');
    $routes->get('notices/edit/(:num)', 'Admin\Notices::edit/$1');
    $routes->post('notices/update/(:num)', 'Admin\Notices::update/$1');
    $routes->get('notices/delete/(:num)', 'Admin\Notices::delete/$1');

    // Events Management
    $routes->get('events', 'Admin\Events::index');
    $routes->get('events/create', 'Admin\Events::create');
    $routes->post('events/store', 'Admin\Events::store');
    $routes->get('events/edit/(:num)', 'Admin\Events::edit/$1');
    $routes->post('events/update/(:num)', 'Admin\Events::update/$1');
    $routes->get('events/delete/(:num)', 'Admin\Events::delete/$1');

    // Admissions Management
    $routes->get('admissions', 'Admin\AdminAdmissions::index');
    $routes->get('admissions/view/(:num)', 'Admin\AdminAdmissions::view/$1');
    $routes->post('admissions/update-status/(:num)', 'Admin\AdminAdmissions::updateStatus/$1');
    $routes->get('admissions/export', 'Admin\AdminAdmissions::exportCSV');
    $routes->get('admissions/delete/(:num)', 'Admin\AdminAdmissions::delete/$1');

    // Toppers Management
    $routes->get('toppers', 'Admin\AdminToppers::index');
    $routes->get('toppers/create', 'Admin\AdminToppers::create');
    $routes->post('toppers/store', 'Admin\AdminToppers::store');
    $routes->get('toppers/edit/(:num)', 'Admin\AdminToppers::edit/$1');
    $routes->post('toppers/update/(:num)', 'Admin\AdminToppers::update/$1');
    $routes->get('toppers/delete/(:num)', 'Admin\AdminToppers::delete/$1');

    // Staff Management
    $routes->get('staff', 'Admin\AdminStaff::index');
    $routes->get('staff/create', 'Admin\AdminStaff::create');
    $routes->post('staff/store', 'Admin\AdminStaff::store');
    $routes->get('staff/edit/(:num)', 'Admin\AdminStaff::edit/$1');
    $routes->post('staff/update/(:num)', 'Admin\AdminStaff::update/$1');
    $routes->get('staff/delete/(:num)', 'Admin\AdminStaff::delete/$1');

    // Pages Management (CMS)
    $routes->get('pages', 'Admin\AdminPages::index');
    $routes->get('pages/create', 'Admin\AdminPages::create');
    $routes->post('pages/store', 'Admin\AdminPages::store');
    $routes->get('pages/edit/(:num)', 'Admin\AdminPages::edit/$1');
    $routes->post('pages/update/(:num)', 'Admin\AdminPages::update/$1');
    $routes->get('pages/delete/(:num)', 'Admin\AdminPages::delete/$1');

    // Gallery Management
    $routes->get('gallery', 'Admin\AdminGallery::index');
    $routes->get('gallery/upload', 'Admin\AdminGallery::upload');
    $routes->post('gallery/store', 'Admin\AdminGallery::store');
    $routes->get('gallery/edit/(:num)', 'Admin\AdminGallery::edit/$1');
    $routes->post('gallery/update/(:num)', 'Admin\AdminGallery::update/$1');
    $routes->get('gallery/delete/(:num)', 'Admin\AdminGallery::delete/$1');

    // School Leaving Certificates
    $routes->get('slc', 'Admin\SchoolLeavingCertificates::index');
    $routes->get('slc/create', 'Admin\SchoolLeavingCertificates::create');
    $routes->post('slc/store', 'Admin\SchoolLeavingCertificates::store');
    $routes->get('slc/edit/(:num)', 'Admin\SchoolLeavingCertificates::edit/$1');
    $routes->post('slc/update/(:num)', 'Admin\SchoolLeavingCertificates::update/$1');
    $routes->get('slc/delete/(:num)', 'Admin\SchoolLeavingCertificates::delete/$1');

    // Users Management (Superadmin Only)
    $routes->get('users', 'Admin\AdminUsers::index');
    $routes->get('users/create', 'Admin\AdminUsers::create');
    $routes->post('users/store', 'Admin\AdminUsers::store');
    $routes->get('users/edit/(:num)', 'Admin\AdminUsers::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\AdminUsers::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\AdminUsers::delete/$1');
});

// Students Management (Legacy - can be accessed by any authenticated user)
$routes->group('students', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Students::index');
    $routes->get('create', 'Students::create');
    $routes->post('store', 'Students::store');
    $routes->get('edit/(:num)', 'Students::edit/$1');
    $routes->post('update/(:num)', 'Students::update/$1');
    $routes->get('delete/(:num)', 'Students::delete/$1');
});
