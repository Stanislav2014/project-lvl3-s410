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
    'as' => 'domainsCreate',
    'uses' => 'DomainsController@domainsCreate'
]);

Route::post('/domains', [
    'as' => 'domainsStore',
    'uses' => 'DomainsController@domainsStore'
]);

Route::get('/domains', [
    'as' => 'domainsIndex',
    'uses' => 'DomainsController@domainsIndex'
]);

Route::get('/domains/{id}', [
    'as' => 'domainsShow',
    'uses' => 'DomainsController@domainsShow'
]);