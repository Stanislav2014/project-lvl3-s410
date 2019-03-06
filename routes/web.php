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
    'as' => 'createDomain',
    'uses' => 'DomainsController@createDomain'
]);

Route::post('/domains', [
    'as' => 'storeDomain',
    'uses' => 'DomainsController@storeDomain'
]);

Route::get('/domains', [
    'as' => 'listDomains',
    'uses' => 'DomainsController@listDomains'
]);

Route::get('/domains/{id}', [
    'as' => 'showDomain',
    'uses' => 'DomainsController@showDomain'
]);