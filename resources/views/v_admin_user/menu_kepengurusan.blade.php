@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Struktur Organisasi IKASMANDU91</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Struktur Organisasi Ikasmandu 91</li>
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
            <h3 class="card-title font-weight-bold mt-2">Struktur Organisasi Kepengurusan Ikasmandu 91</h3>
            <div class="card-tools">
              <a href="{{ url('admin-user/organisasi/detail-struktur-kepengurusan/'. $struktur->id_sub_menu_5) }}" class="btn btn-success">
                <i class="fas fa-edit"></i> Ubah
              </a>
              <button type="button" class="btn btn-success" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-md-12 text-center">
                  <img src="{{ asset('images/main/structure/'. $struktur->sm5_img) }}" class="m-3 img-thumbnail" style="max-width: 50%;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card card-success card-outline">
          <div class= "card-header">
            <h3 class="card-title font-weight-bold mt-2">Pengurus Ikasmandu 91</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-success" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-md-12" id="pengurus">
              <div class="form-group row">
                <div class="col-md-12">
                  <div class="row">
                    @foreach($pengurus as $pengurus)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0 text-capitalize">
                          {{ $pengurus->committee_name }}
                        </div>
                        <div class="card-body pt-0">
                          <div class="row">
                            <div class="col-7">
                              <h2 class="lead text-capitalize"><b>{{ $pengurus->alumni_name }}</b></h2>
                              <p class="text-muted text-sm"><b>About: </b> {!! \Illuminate\Support\Str::limit($pengurus->sm6_description, 50) !!}</p>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-home"></i></span> {{ $pengurus->alumni_domicile }}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-phone"></i></span> {{ $pengurus->alumni_phone_number }}</li>
                              </ul>
                            </div>
                            <div class="col-5 text-center">
                              @if($pengurus->alumni_img == null)
                              <img class="profile-user-img img-fluid img-circle" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil">
                              @else
                              <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/alumni/'.$pengurus->alumni_img) }}" alt="Profil" 
                              style="width: 110px;height: 110px;">
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="text-right">
                            <a href="{{ url('admin-user/alumni/detail/'. $pengurus->id_alumni) }}" class="btn btn-sm btn-primary">
                              <i class="fas fa-user"></i> Profil
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
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