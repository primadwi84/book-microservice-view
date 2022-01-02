@extends('layout/template')

@section('judul', 'Notification')

@section('container')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div id="flash" data-flash="{{ session('status') }}"></div>
                @endif
                <div class="card">
                    <h5 class="card-title text-center mt-4 fs-4">Notification</h5>

                    <div class="card-body">

                        @foreach ($data as $notif)
                        <div class="card">
                            <div class="card-header">
                                @if ($notif["category"] == 'new-book')
                                {{$notif["title"]}} <span class="badge badge-primary">new book</span>
                                @elseif ($notif["category"] == 'product-alert')
                                {{$notif["title"]}} <span class="badge bg-warning">alert</span>
                                @else
                                @endif
                            </div>

                            <div class="card-body">
                                <p class="card-text">{{$notif["description"]}} </p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@endsection
