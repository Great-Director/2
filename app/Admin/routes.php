<?php

use Illuminate\Routing\Router;

Admin::routes();
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
	$router->resource('movies', MovieController::class);
	$router->resource('people', PeoplesController::class);
	$router->resource('projects', ProjectController::class);
	$router->resource('companies', Companyontroller::class);
	$router->resource('analysis', analysisController::class);
	$router->resource('projectana', Projectanalysis::class);
});
