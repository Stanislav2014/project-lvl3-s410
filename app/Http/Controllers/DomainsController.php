<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Container\Container;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use GuzzleHttp\Client;
use Log;
use DiDom\Document;
use DiDom\Query;

class DomainsController extends Controller
{
   
    public function create(Request $request)
    {
        

        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:domains'
        ]);

        if ($validator->fails()) {
            return view('create', ['errors' => $validator->errors()->all()]);
        }

        $name = $request->input('name');

        //$client = HttpClientGuzzle::class ;
        $container = Container::getInstance();
        $client = $container->make('GuzzleHttp\Client');

        try {
            $res = $client->get($name);
        } catch (\Exception $e) {
            return view('create', ['errors' => [$e->getMessage()]]);
        }
        
        $contentLength = $res->getHeader('content-length')[0] ?? '';

        $responseCode = $res->getStatusCode();

        $body = $res->getBody()->getContents();

        $document = new Document($body);

        if ($document->has('h1')) {
            $h1 = $document->first('h1')
                           ->text();
        } else {
            $h1 = '';
        }

        if ($document->has('meta[name="keywords"]')) {
            $keywords = $document->first('meta[name="keywords"]')
                                 ->getAttribute('content');
        } else {
            $keywords = '';
        }

        if ($document->has('meta[name="desription"]')) {
            $description = $document->first('meta[name="description"]')
                                 ->getAttribute('content');
        } else {
            $description = '';
        }

        Log::info($contentLength);
        

        $time = Carbon::now();

        $id = DB::table('domains')
                ->insertGetId([
                    'name' => $name,
                    'updated_at' => $time,
                    'content_length' => $contentLength,
                    'response_code' => $responseCode,
                    'body' => $body,
                    'h1' => $h1,
                    'keywords' => $keywords,
                    'description' => $description
                ]);

        return redirect()->route('domains.show', ['id' => $id]);
    }

    public function index()
    {
            $domains = DB::table('domains')
                ->paginate(5);
                
            return view('show', [
                'domains' => $domains, 
                'paginate' => 'true'
                ]);
    }

    public function show($id)
    {
        $domains = DB::table('domains')
            ->select()
            ->where('domains.id', $id)
            ->get();
        
        return view('show', [
            'domains' => $domains,
            'moreInfo' => 'true'
            ]);
    }
}
