@extends('layout/template')

@section('judul', 'Refund')

@section('container')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div id="flash" data-flash="{{ session('status') }}"></div>
                @endif 
                <div class="card">
                 <h5 class="card-title text-center mt-4 fs-4">Refund</h5>
                    <div class="card-header">
                        <!-- <div class="d-grid gap-2 d-md-flex">
                            <a class="btn btn-outline-success" data-toggle="modal" data-target="#modal-create">Tambah Data <i class="fas fa-plus ml-2"></i></a>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mahasiswatb" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Resellable</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $refund) 
                                        <tr>
                                            <td scope="row">{{ $loop->iteration}}</td>
                                            <td>{{ $refund['sale']['product']['NAMA']}}</td> 
                                            <td>{{ $refund['sale']['product']['HARGA_JUAL']}}</td> 
                                            <td>
                                                @if($refund['RESELLABLE']==1)
                                                yes
                                                @else
                                                no
                                                @endif
                                            </td>
                                            <td>{{ $refund['created_at']}}</td>
                                            <td>
                                                <a href="/refunds/{{$refund['id']}}/edit" class="btn btn-outline-success btn-sm mr-2">Edit</a>
                                                <a href="/refunds/{{$refund['id']}}/delete" class="btn btn-outline-danger btn-sm" id="btn-hapus">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</section>
  
@endsection