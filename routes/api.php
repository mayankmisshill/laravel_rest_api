<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->get('test', function () {
        return 'It is ok';
    });

    $api->get('login','App\HTTP\Controllers\Api\LoginController@show')->middleware('tokenexist');
    $api->get('register', 'App\HTTP\Controllers\Api\RegisterController@show')->middleware('tokenexist');
    $api->get('profile', 'App\HTTP\Controllers\Api\LoginController@profile')->middleware('tokenexist');

    $api->post('login', 'App\HTTP\Controllers\Api\LoginController@authenticate')->middleware('tokenexist');
    $api->post('register', 'App\HTTP\Controllers\Api\RegisterController@create')->middleware('tokenexist');

    $api->get('logout', 'App\HTTP\Controllers\Api\LoginController@logout');

});
