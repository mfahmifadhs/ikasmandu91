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
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-success">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>IKASMANDU 91</b></a>
        <h6 class="mb-0">Ikatan Keluarga Alumni SMAN 2 Padang Angkatan 1991</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 form-group">
            <div class="brand-logo mb-0">
              <img src="{{ asset('images/main/logo-ikasmandu.png') }}" alt="logo" width="150">
            </div>
            <h6 class="mt-4">Panduan Pendaftaran Ikasmandu91</h6>
            <p style="line-height: 4vh;">
              1. Pastikan kamu sudah adalah Alumni SMAN 2 Padang. <br>
              2. Melakukan pendataan sebagai alumni <a href="{{ url('main/input-data-alumni') }}">disini</a> <br>
              3. Alamat email diisi sesuai dengan email pendataan alumni. <br>
              4. Password diisi minimal 8 karakter.
            </p>
            <p style="line-height: 2vh;">
              <span style="color: red;">
                &#x2022; Email yang telah terdaftar, tidak dapat didaftarkan kembali.
              </span>
            </p>
            <p style="line-height: 2vh;">
              <span style="color: red;">
                &#x2022; Jika email yang didaftarkan tidak sesuai dengan email pada saat pendataan alumni / 
                belum melakukan pendataan alumni maka proses pendaftaran tidak dapat dilakukan.
              </span>
            </p>
          </div>
          <div class="col-md-6 form-group">
            <p class="login-box-msg">Pendaftaran Pengguna IKASMANDU 91</p>
            <form action="../../index.html" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Email terdaftar">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-12 mt-2">
                <button type="submit" class="btn btn-success btn-block font-weight-bold">Daftar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <p class="mt-2">Sudah punya akun? <a href="{{ route('login') }}" class="text-center">Masuk</a></p>
        </div>
      </div>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('dist-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist-admin/js/adminlte.min.js') }}"></script>
</body>
</html>
