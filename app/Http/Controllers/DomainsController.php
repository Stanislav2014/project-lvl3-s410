<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DomainsController extends Controller
{
   
    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        //$validate = $this->validate($request, [
        //    'name' => 'url',
        //]);
    
        
        $name = $request->input('name');
        DB::table('domains')
        ->updateOrInsert(
            ['name' => $name],
            ['name' => $name]
        );
        var_dump($name);
        $result = DB::table('domains')
        ->select('id')
        ->where('domains.name', 'LIKE', $name)
        ->get();
        $getId = $result[0]->id;

        var_dump($getId);

        return redirect("/domains/{$getId}");//->route('domains', ['id' => $getId]);
    }
}
