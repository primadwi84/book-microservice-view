<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewsController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 2|OUzqPs3K5u8vpazlNES56HjiXDHsAYvJCMphmFma'
        ])->get('http://127.0.0.1:8081/api/products');
        $data = $response->json();   
        return view('products.index', compact('data'));
    }
}
