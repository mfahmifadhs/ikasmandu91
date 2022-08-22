<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IKASMANDU 91</title>
  <link rel="icon" href="{{ asset('images/main/logo-title.png') }}"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist-admin/css/adminlte.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
 @if ($message = Session::get('success'))
   <div class="alert alert-success">
    <p class="fw-light" style="margin: auto;">{{ $message }}</p>
  </div>
  @endif
  @if ($message = Session::get('failed'))
  <div class="alert alert-danger">
    <p class="fw-light" style="margin: auto;">{{ $message }}</p>
  </div>
  @endif
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <img src="{{ asset('images/main/logo-ikasmandu.png') }}" width="250">
    </div>
    <div class="card-body">
      <center class="mb-4">
        <a href="{{ url('/') }}" class="h4">Selamat Datang</b>
        <h6 class="mb-0 text-center">Ikatan Keluarga Alumni SMAN 2 Padang Angkatan 1991</h6></a>
      </center>
      <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Masukan username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 mt-2">
          <input type="password" name="password" class="form-control" id="show-password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <a type="button" onclick="myFunction()">
                <i class="fas fa-eye"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4 mt-3 mb-4">
            <button type="submit" class="btn btn-success btn-lg btn-block font-weight-bold">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <!-- Belum punya akun ? <a href="{{ route('register-user') }}">Daftar</a> -->
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('dist-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist-admin/js/adminlte.min.js') }}"></script>
<script>
    function myFunction() {
      var x = document.getElementById("show-password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
</body>
</html>
