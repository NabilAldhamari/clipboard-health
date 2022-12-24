<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('api/login', 'AuthController@login');

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->post('add',  ['uses' => 'EmployeeStatsController@addEmployee']);
    $router->delete('delete/{id}', ['uses' => 'EmployeeStatsController@deleteEmployee']);
    $router->get('fetch/all',  ['uses' => 'EmployeeStatsController@showAllEmployees']);
    $router->get('fetch/contracted', ['uses' => 'EmployeeStatsController@showContractedEmployees']);
    $router->get('fetch/department/{department}', ['uses' => 'EmployeeStatsController@showEmployeesInDepartment']);
    $router->get('fetch/department/{department}/{subdepartment}', ['uses' => 'EmployeeStatsController@showEmployeesInSubDepartment']);
});