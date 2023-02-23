<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch;
use Elasticsearch\ClientBuilder;
use Matchory\Elasticsearch\Facades\ES;
class Homecontroller extends Controller
{
    public function index()
    {
        //p$client = ClientBuilder::create()->build();
        // $data = [
        //     'body' => [
        //         'testField' => 'abc'
        //     ],
        //     'index' => 'my_index',
        //     'type' => 'my_type',
        //     'id' => 'my_id',
        // ];
      
        // $return = Elasticsearch::index($data);

        $resp=ES::index('posts')->create();
        dd($resp);
    }
}
