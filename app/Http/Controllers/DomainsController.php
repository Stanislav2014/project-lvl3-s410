<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

class DomainsController extends Controller
{
   
    public function domainsCreate(Request $request)
    {
        //$errors = $request->input('errors') ?? null;

        return view('create');// ['errors' => [$errors]]);
    }

    public function domainsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:domains'
        ]);

        if ($validator->fails()) {
            return redirect()->route('domainsCreate');
        }

        $time = Carbon::now();
        $name = $request->input('name');
        DB::table('domains')
        ->insert(
            ['name' => $name, 'updated_at' => $time]
        );
        //var_dump($name);
        $result = DB::table('domains')
            ->select('id')
            ->where('domains.name', 'LIKE', $name)
            ->get();
        $id = $result[0]->id;

        //var_dump($getId);

        return redirect()->route('domainsShow', ['id' => $id]);
    }

    public function domainsIndex()
    {
            $domains = DB::table('domains')
                ->select()
                ->get();
                
            return view('show', ['domains' => $domains]);
    }

    public function domainsShow($id)
    {
        $domains = DB::table('domains')
            ->select()
            ->where('domains.id', 'LIKE', $id)
            ->get();
        //var_dump($domain);
        return view('show', ['domains' => $domains]);
    }
}
