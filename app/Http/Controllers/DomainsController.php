<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

class DomainsController extends Controller
{
   
    public function create(Request $request)
    {
        //$errors = $request->input('errors') ?? null;

        return view('create');// ['errors' => [$errors]]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:domains'
        ]);

        //if ($validator->fails()) {
        //    return redirect()->route('domains.create');
        //}

        if ($validator->fails()) {
            return view('create', ['errors' => $validator->errors()->all()]);
        }

        $time = Carbon::now();
        $name = $request->input('name');
        //DB::table('domains')
        //->insert(
        //    ['name' => $name, 'updated_at' => $time]
        //);
        //var_dump($name);
        $id = DB::table('domains')
            //->select('id')
            //->where('domains.name', $name)
            //->get();
            ->insertGetId([
                'name' => $name, 'updated_at' => $time
                ]);
        //$id = $result[0]->id;

        //var_dump($getId);

        return redirect()->route('domains.show', ['id' => $id]);
    }

    public function index()
    {
            $domains = DB::table('domains')
                ->paginate(10);
                
            return view('show', ['domains' => $domains, 'paginate' => 'true']);
    }

    public function show($id)
    {
        $domains = DB::table('domains')
            ->select()
            ->where('domains.id', $id)
            ->get();
        //var_dump($domain);
        return view('show', ['domains' => $domains]);
    }
}
