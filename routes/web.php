<?php

use Illuminate\Http\Request;

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

Route::get('/', [
    'as' => 'create',
    'uses' => 'DomainsController@create'
]);

Route::post('/domains', [
    'as' => 'store',
    'uses' => 'DomainsController@store'
]);

Route::get('/domains', [
    'as' => 'list',
    'uses' => 'DomainsController@list'
]);

Route::get('/domains/{id}', [
    'as' => 'show',
    'uses' => 'DomainsController@show'
]);