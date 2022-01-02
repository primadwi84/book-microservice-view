@extends('layout/template')

@section('judul', 'Tambah Data Refund')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="post" action="/refunds">
                @csrf
                <div class="form-group" style="display: none;">
                    <label for="ID_SALES">ID_SALES</label>
                    <input type="text" class="form-control @error('ID_SALES') is-invalid @enderror" id="ID_SALES"
                        placeholder="Masukkan ID_SALES" name="ID_SALES" value={{$id}}>
                    @error('ID_SALES')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="RESELLABLE">RESELLABLE</label>
                    <select class="form-control select2" style="width: 100;" name="RESELLABLE" id="RESELLABLE"
                        value="{{old('RESELLABLE')}}">
                        <option value=0>NO</option>
                        <option value=1>YES</option>
                    </select>
                </div>
                <button type="sumbit" class="btn btn-outline-primary my-3 mr-2">Tambah Data</button>
                <a href="/refunds" class="btn btn-outline-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
