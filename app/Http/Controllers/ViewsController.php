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
            'Authorization' => 'Bearer 6|BefdT13vDh4xwJueLrmRHBKGk8CrKOsVNRhHi5fr'
        ])->get('http://127.0.0.1:8081/api/products');

        $data = $response->json();
        dd($data);

        $title="Data Dashboard";     
        return view('takes', compact('title','data'));
    }
}
