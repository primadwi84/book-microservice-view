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
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B'
        ])->get('http://127.0.0.1:8081/api/products');
        $data = $response->json();   
        return view('products.index', compact('data'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request )
    {
        $request->validate([
            'NAMA'=> 'required',
            'HARGA_BELI'=> 'required',
            'HARGA_JUAL'=> 'required',
            'STOK'=> 'required'
        ],
        [
            'NAMA.required'=>'Judul Buku Wajib Diisi!',
            'HARGA_BELI.required'=>'Harga Beli Wajib Diisi!',
            'HARGA_JUAL.required'=>'Harga Jual Wajib Diisi!',
            'STOK.required'=>'Stok Wajib Diisi!'
        ]);

        $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
            ])->post('http://127.0.0.1:8081/api/products',[
                'NAMA' => $request->NAMA,
                'HARGA_BELI' => $request->HARGA_BELI,
                'HARGA_JUAL' => $request->HARGA_JUAL,
                'STOK' => $request->STOK
            ]);
        
        return redirect('/first')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->get('http://127.0.0.1:8081/api/products/'.$id);
        $data = $response->json(); 
        return view('products.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA'=> 'required',
            'HARGA_BELI'=> 'required',
            'HARGA_JUAL'=> 'required',
            'STOK'=> 'required'
        ],
        [
            'NAMA.required'=>'Judul Buku Wajib Diisi!',
            'HARGA_BELI.required'=>'Harga Beli Wajib Diisi!',
            'HARGA_JUAL.required'=>'Harga Jual Wajib Diisi!',
            'STOK.required'=>'Stok Wajib Diisi!'
        ]);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->patch('http://127.0.0.1:8081/api/products/'.$id ,[
            'NAMA' => $request->NAMA,
            'HARGA_BELI' => $request->HARGA_BELI,
            'HARGA_JUAL' => $request->HARGA_JUAL,
            'STOK' => $request->STOK
        ]);
        // $data = Product::find($id);
        // $data->update($request->all());
        return redirect('/first')->with('status', 'Data Berhasil Diubah'); 
    }

    public function delete($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 4|EBTMVvKeP0HnmF86VPWFxFNYXk3TL0dIKnlaJz9B '
        ])->delete('http://127.0.0.1:8081/api/products/'.$id,[
        ]);
        return redirect('/first')->with('status', 'Data Berhasil Dihapus');
    }


}
