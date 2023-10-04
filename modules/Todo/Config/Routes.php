<?php

// Páginas fora do controle de login
$routes->group('/', ['namespace' => '\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('', 'Auth::index');
    $routes->group('auth', function ($routes) {
        $routes->get('', 'Auth::index');
        // login e logout
        $routes->get('logout', 'Auth::logout');
        $routes->get('login', 'Auth::login');
        $routes->post('login', 'Auth::login');
    });
});

// rotas protegidas
$routes->group('todo', ['namespace' => '\Modules\Todo'], function ($routes) {
    // painel principal
    $routes->get('/', 'Dashboard\Controllers\Dashboard::index');
    $routes->get('dashboard', 'Dashboard\Controllers\Dashboard::index');
    // nossas tarefas
    $routes->group('tasks', function ($routes) {
        $routes->get('', 'Tasks\Controllers\Tasks::index');
        $routes->get('all', 'Tasks\Controllers\Tasks::all');
        $routes->get('new', 'Tasks\Controllers\Tasks::new', ['as' => 'task.new']);
        $routes->post('save', 'Tasks\Controllers\Tasks::save');
        $routes->get('ajax', 'Tasks\Controllers\Tasks::ajax');
        $routes->post('ajax', 'Tasks\Controllers\Tasks::ajax');

        $routes->get('edit/(:num)', 'Tasks\Controllers\Tasks::edit/$1');
        $routes->get('delete/(:num)', 'Tasks\Controllers\Tasks::delete/$1');
        $routes->get('view/(:num)', 'Tasks\Controllers\Tasks::view/$1');
        $routes->get('close/(:num)', 'Tasks\Controllers\Tasks::close/$1');
    });
});
