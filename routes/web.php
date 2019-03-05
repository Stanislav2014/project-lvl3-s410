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

//$router->get('/', function () {
//    return view('home', ['name' => 'James']);
//});

Route::get('/', 'DomainsController@create');

Route::post('/domains', 'DomainsController@store');
//function (Request $request) {
  //  $name = $request->input('name');
    //DB::table('domains')
      //  ->updateOrInsert(
        //    ['name' => $name], ['name' => $name]
        //);
    //var_dump($name);
    //$result = DB::table('domains')
    //    ->select('id')
     //   ->where('domains.name', 'LIKE', $name)
     //   ->get();
  //  $getId = $result[0]->id;
//
    //var_dump($getId);

    //return redirect("/domains/{$getId}");//->route('domains', ['id' => $getId]);
//});

$router->get('/domains', function () {
    $domains = DB::table('domains')
        ->select()
        ->get();
        
    return view('show', ['domains' => $domains]);
});

$router->get('/domains/{id}', function ($id) {
    $domain = DB::table('domains')
        ->select()
        ->where('domains.id', 'LIKE', $id)
        ->get();
    var_dump($domain);
    return view('layouts/domainInfo', ['domain' => $domain]);
});
