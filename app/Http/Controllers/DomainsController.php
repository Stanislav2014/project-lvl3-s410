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

        return redirect("/domains/{$getId}");
    }

    public function list(Request $request)
    {
            $domains = DB::table('domains')
                ->select()
                ->get();
                
            return view('show', ['domains' => $domains]);
    } 

    public function show($id)
    {
        $domain = DB::table('domains')
            ->select()
            ->where('domains.id', 'LIKE', $id)
            ->get();
        var_dump($domain);
        return view('layouts/domainInfo', ['domain' => $domain]);
    } 
       


}
