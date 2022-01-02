<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SalesController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B'
        ])->get('http://127.0.0.1:8081/api/sales');
        $data = $response->json();  
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B'
        ])->get('http://127.0.0.1:8081/api/products');
        $pro = $response->json();   
        return view('sales.index', compact('data', 'pro'));
    }
    public function create()
    {
        return view('sales.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'REFUND'=> 'required',
            'product_id'=> 'required',
        ],
        [
            'REFUND.required'=>'REFUND Wajib Diisi!',
        ]);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->post('http://127.0.0.1:8081/api/sales',[
            'REFUND' => $request->REFUND,
            'product_id' => $request->product_id
        ]);
    
         return redirect('/sales')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->get('http://127.0.0.1:8081/api/sales/'.$id);
        $data = $response->json(); 
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B'
        ])->get('http://127.0.0.1:8081/api/products');
        $pro = $response->json();   
        return view('sales.edit', compact('data', 'pro'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'REFUND'=> 'required'
        ],
        [
            'REFUND.required'=>'REFUND Wajib Diisi!'
        ]);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->patch('http://127.0.0.1:8081/api/sales/'.$id ,[
            'REFUND' => $request->REFUND
        ]);
        // $data = Product::find($id);
        // $data->update($request->all());
        return redirect('/sales')->with('status', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->delete('http://127.0.0.1:8081/api/sales/'.$id,[
        ]);
        return redirect('/sales')->with('status', 'Data Berhasil Dihapus');
    }
}