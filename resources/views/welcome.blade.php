<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="Assets/bs5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--icon-->
    <link rel="stylesheet" href="Assets/icon/css/all.min.css">
    

    <link rel="stylesheet" href="Assets/css/navbar.css">
    <link rel="stylesheet" href="Assets/css/body.css">
    


    <title> Book Day</title>
  </head>
  <body>
      <!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" id="navbar">
          <div class="container">
              <a class="navbar-brand" href="#">
                  <img src="Media/buku.jpg" height="55px">
               </a> 
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle navigation">
                   <span class="navbar-toggler-icon"></span> 
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div></div>  
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active bg-active link bold1" href="/catalog">Catalog&nbsp;&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active bg-active link bold1" href="/sales">Sales&nbsp;&nbsp;</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn bg-custom rounded bold1 shadow">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn bg-custom rounded bold1 shadow">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>     
        </nav>        
        <!--konten-->
        <div class="container">
            <br><br>
            <div class="row mt-5 mb-5">
                <div class="col-lg-12 gambar">
                    <img src="Media/buku.jpg" width="100%">
                </div>
                <div class="col-sm-12 position-relative p-4">
                    <div class="position-absolute top-0 end-0">
                        <img src="Media/buku.jpg" class="img">
                    </div>
                    <h1 class="display-1 text-truncate bold1">Let's Reading</h1>
                    <h1 class="display-1 text-truncate bold1">Together</h1>
                    <div class="desc mt-4">
                        <p>Ayo, Temukan Buku Favorit Mu Di Sini! Coba Juga Melihat Variasi Lain Dari Favorit Mu Untuk Menambah List Membaca Mu! Happy Reading</p>
                    </div>

                    <div class="tombol mt-5">
                        <a href="/catalog" class="button rounded-pill shadow bold1">Catalog</a>
                        <a href="/sales" class="button rounded-pill shadow bold1">Sales</a>
                    </div>
                    <br>
                    <div class="flex at-5">
                        <a href="#" class="btn rounded-circle bg-custom shadow bold1 m-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn rounded-circle bg-custom shadow bold1 m-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn rounded-circle bg-custom shadow bold1 m-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn rounded-circle bg-custom shadow bold1 m-2"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="btn rounded-circle bg-custom shadow bold1 m-2"><i class="fab fa-youtube"></i></a>
                        
                    </div>
                </div>
            </div>
        </div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="Assets/bs5/dist/js/bootstrao.bundle.js"></script>
    <script src="Assets/icon/js/all.min.js"></script>
  </body>
</html>