<?php 
$site = DB::table('konfigurasi')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ $site->deskripsi }}">
  <meta name="keywords" content="{{ $site->keywords }}">
  <meta name="author" content="{{ $site->namaweb }}">
  <title>{{ $title }}</title>
  <link rel="shortcut icon" href="{{ asset('public/upload/image/'.$site->icon) }}">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('public/admin/css/sb-admin-2.css') }}" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
  <!-- sweetalert -->
  <script src="{{ asset('public/sweetalert/js/sweetalert.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('public/sweetalert/css/sweetalert.css') }}">
  <style type="text/css" media="screen">
    .bg-login-image, .bg-register-image, .bg-password-image {
      background: url("{{ asset('public/upload/image/'.$site->gambar) }}");
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
  </style>
</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 5%;">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12 text-center">
                
              </div>
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                     <h1 class="h4 text-gray-900 mb-4">{{ $site->namaweb }}</h1>
                    <hr>
                    <p>{{ $site->tagline }}</p>
                    <hr>
                    <p>Anda lupa password?<br>Masukkan alamat <strong>email</strong> Anda, lalu klik tombol <strong>Reset Password</strong>. Link reset password akan dikirimkan ke email tersebut.</p>
                    <hr>
                  </div>
                  <form action="{{ asset('login/cek') }}" method="post" accept-charset="utf-8">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Email...">
                      <small class="text-danger"></small>
                    </div>
                   
                    <button class="btn btn-primary btn-block btn-user" type="submit" name="submit">
                      <i class="fa fa-lock"></i> Reset Password
                    </button>
                                     
                  </form>                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ asset('login') }}">Login User</a> | <a class="small" href="{{ ('/home') }}">Kembali ke Beranda</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>


</script>
  
  <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('public/admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
