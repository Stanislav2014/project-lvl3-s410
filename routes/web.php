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
    'as' => 'domains.create',
    'uses' => 'DomainsController@create'
]);

Route::post('/domains', [
    'as' => 'domains.store',
    'uses' => 'DomainsController@store'
]);

Route::get('/domains', [
    'as' => 'domains.index',
    'uses' => 'DomainsController@index'
]);

Route::get('/domains/{id}', [
    'as' => 'domains.show',
    'uses' => 'DomainsController@show'
]);
