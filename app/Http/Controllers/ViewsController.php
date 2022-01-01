<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia');
        $data = $response->json();
        dd($data);

        $title="Data Dashboard";     
        return view('takes', compact('title','data'));
    }
}
