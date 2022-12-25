<?php

use App\Models\produk;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

$router->get('/key', function () {
    return str::random(32);
});


Route::group([

    // 'middleware' => 'auth',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

$router->group(
    [
        'middleware' => 'auth',
        'prefix' => 'produk'
    ],
    function ($router){
        Route::get('/', 'ProdukController@index');
        Route::get('/{id}', 'ProdukController@show');
        Route::post('/store', 'ProdukController@store');
    }
);
