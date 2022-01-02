<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NodeAPIController extends Controller
{
    //
    public function notif(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('http://localhost:3000/notif/today');
        $data = $response->json(); 
        // dd($data)  ;
        return view('notif.index', compact('data'));
    }
}
