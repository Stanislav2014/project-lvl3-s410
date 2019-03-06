<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DomainsController extends Controller
{
   
    public function createDomain()
    {
        return view('home');
    }

    public function storeDomain(Request $request)
    {
        $time = Carbon::now();
        $name = $request->input('name');
        DB::table('domains')
        ->updateOrInsert(
            ['name' => $name],
            ['name' => $name,
            'updated_at' => $time]
        );
        //var_dump($name);
        $result = DB::table('domains')
            ->select('id')
            ->where('domains.name', 'LIKE', $name)
            ->get();
        $getId = $result[0]->id;

        //var_dump($getId);

        return redirect("/domains/{$getId}");
    }

    public function listDomains(Request $request)
    {
            $domains = DB::table('domains')
                ->select()
                ->get();
                
            return view('show', ['domains' => $domains]);
    } 

    public function showDomain($id)
    {
        $domain = DB::table('domains')
            ->select()
            ->where('domains.id', 'LIKE', $id)
            ->get();
        //var_dump($domain);
        return view('layouts/domainInfo', ['domain' => $domain]);
    } 
       


}
