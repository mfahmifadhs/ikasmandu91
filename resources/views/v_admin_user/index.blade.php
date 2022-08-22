@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard v2</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v2</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Alumni</span>
            <span class="info-box-number">
              {{ $alumnis->count() }}
              <small>Alumni</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Members</span>
            <span class="info-box-number">2,000</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-4" id="kata-sambutan">
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            Kata Sambutan
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b>Ketua Ikasmandu91</b></h2>
                <p class="small">Ketua Ikasmandu91 (2022-2025)</p>
                <ul class="ml-4 m-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-building"></i></span> Indonesia</li>
                  <li class="small mt-2"><span class="fa-li"><i class="fas fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                </ul>
              </div>
              <div class="col-5 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/599/599305.png" width="110" class="img-circle img-fluid">
              </div>
              <div class="col-md-12 text-justify">
                <hr>
                <p class="text-muted text-sm">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="#" class="btn btn-sm btn-success">
                <i class="fas fa-edit"></i> Ubah
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                Sejarah Sekolah
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-4">
                    <h2 class="lead"><b>Sejarah SMAN 2 Padang</b></h2>
                    <img src="{{ asset('images/main/history/'. $history->sm1_img) }}" class="img-thumbnail img-fluid">
                  </div>
                  <div class="col-8 text-center mt-3">
                    <p class="text-muted text-sm">
                      <!-- Jumlah karakter : 446 -->
                      {!! \Illuminate\Support\Str::limit($history->sm1_text, 446) !!}
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="{{ url('admin-user/sekolah/sejarah/sman2-padang') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-arrow-circle-right"></i> Baca Selengkapnya
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                Profil Sekolah
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-4">
                    <h2 class="lead"><b>Profil SMAN 2 Padang</b></h2>
                    <img src="{{ asset('images/main/profile_school/'. $profile->sm2_img) }}" class="img-thumbnail img-fluid">
                  </div>
                  <div class="col-8 text-center mt-3">
                    <p class="text-muted text-sm">
                      <!-- Jumlah karakter : 446 -->
                      {!! \Illuminate\Support\Str::limit($profile->sm2_text, 446) !!}
                    </p>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="{{ url('admin-user/sekolah/profil/sman2-padang') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-arrow-circle-right"></i> Baca Selengkapnya
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection