<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $client = ClientBuilder::create()->build();

        $params = [
            'index' => 'products',
            'body' => [
                'query' => [
                    'match_all' => new \stdClass()
                ]
            ]
        ];

        $response = $client->search($params);

        $products = collect($response['hits']['hits'])->map(function ($hit) {
            return $hit['_source'];
        });

        return response()->json(['data' => $products], 200);
    }
}
