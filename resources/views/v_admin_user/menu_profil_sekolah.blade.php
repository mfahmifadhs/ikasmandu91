@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Profil SMAN 2 Padang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Profil SMAN 2 Padang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
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
      </div>
      <div class="col-md-12">
        <div class="card card-success card-outline">
          <div class= "card-header">
            <h3 class="card-title font-weight-bold mt-2">Profil SMAN 2 Padang</h3>
            <div class="card-tools">
              <a href="{{ url('admin-user/sekolah/detail-profil-sman2-padang/'. $profil->id_sub_menu_2) }}" class="btn btn-success">
                <i class="fas fa-edit"></i> Ubah
              </a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group row">
              <div class="col-md-5 form">
                <img src="{{ asset('images/main/profile_school/'. $profil->sm2_img) }}" class="ml-2 img-thumbnail" style="max-width: 95%;margin-top: 12%;">
              </div>
              <div class="col-md-7 form">
                <p>
                  {!! $profil->sm2_text !!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




@endsection