<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RefundsController extends Controller
{
    private $token ="6|nxAW1GISxNGii1RkqmsFC7FNB01vbgK0ZOOH3zHn" ;
    public function index()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->get('http://127.0.0.1:8081/api/refunds');
        $data = $response->json();  
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->get('http://127.0.0.1:8081/api/products');
        $pro = $response->json(); 
        // dd($data);
        return view('refund.index', compact('data', 'pro'));
    }
    public function create($id)
    {
        return view('refund.create', compact('id', 'id'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ID_SALES'=> 'required',
            'RESELLABLE'=> 'required'
        ],
        [
            'ID_SALES.required'=>'ID_SALES Wajib Diisi!',
            'RESELLABLE.required'=>'RESELLABLE Wajib Diisi!'
        ]);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->post('http://127.0.0.1:8081/api/refunds',[
            'ID_SALES' => $request->ID_SALES,
            'RESELLABLE' => $request->RESELLABLE
        ]);
         return redirect('/refunds')->with('status', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->get('http://127.0.0.1:8081/api/refunds/'.$id);
        $data = $response->json(); 
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->get('http://127.0.0.1:8081/api/products');
        $pro = $response->json();   
        return view('refund.edit', compact('data', 'pro'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_SALES'=> 'required',
            'RESELLABLE'=> 'required'
        ],
        [
            'ID_SALES.required'=>'ID_SALES Wajib Diisi!',
            'RESELLABLE.required'=>'RESELLABLE Wajib Diisi!'
        ]);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->patch('http://127.0.0.1:8081/api/refunds/'.$id ,[
            'ID_SALES' => $request->ID_SALES,
            'RESELLABLE' => $request->RESELLABLE
        ]);
        // $data = Product::find($id);
        // $data->update($request->all());
        return redirect('/refunds')->with('status', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->token
        ])->delete('http://127.0.0.1:8081/api/refunds/'.$id,[
        ]);
        return redirect('/refunds')->with('status', 'Data Berhasil Dihapus');
    }
}
