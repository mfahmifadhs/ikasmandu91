@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Berita SMAN 2 Padang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Berita SMAN 2 Padang</li>
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
      <div class="col-md-3 form-group">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title" style="font-size: 14px">Kategori Berita</h6>
          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              @foreach($category as $kategori)
              <li class="nav-item active">
                <a href="{{ url('admin-user/berita/cari/'. $kategori->category_name) }}" class="nav-link">
                  <i class="fas fa-folder"></i> {{ $kategori->category_name }}
                  <span class="badge bg-success float-right mt-1">{{ $kategori->totalctg }} berita</span>
                </a>
              </li>
              @endforeach
              <li class="nav-item active">
                <a href="{{ url('admin-user/berita/daftar/semua') }}" class="nav-link">
                  <i class="fas fa-folder"></i> Semua
                  <span class="badge bg-success float-right mt-1">{{ $category->sum('totalctg') }} berita</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-9 form-group">
        <div class="row">
          <div class="col-md-10 form-group">
            <form action="{{ url('admin-user/berita/cari/informasi') }}" method="POST">
              @csrf
              <div class="input-group">
                <input class="form-control form-control-sidebar" name="search" placeholder="Cari Berdasarkan Judul Berita">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2 form-group">
            <a href="{{ url('admin-user/berita/tambah/baru') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
            <a href="{{ url('admin-user/berita/daftar/arsip') }}" class="btn btn-success"><i class="fas fa-archive"></i></a>
            <a href="{{ url('admin-user/berita/daftar/semua') }}" class="btn btn-success"><i class="fas fa-sync"></i></a>
          </div>
          <div class="col-md-1">
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title mt-2">Daftar Berita</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-default" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            @foreach($news as $berita)
            <div class="row">
              <div class="col-md-5 text-center">
                <img src="{{ asset('images/news/'. $berita->sm3_img) }}" style="width: 70%;" class="img-thumbnail m-2"> 
              </div>
              <div class="col-md-7 text-capitalize">
                <h3 class="lead mt-2">
                  <a href="{{ url('admin-user/berita/detail/'. $berita->id_sub_menu_3) }}"><strong>{{ $berita->sm3_title }}</strong></a><br>
                  <span style="font-size: 12px;">
                    <i class="fas fa-folder"></i> {{ $berita->category_name }} | &nbsp;
                    <i class="fas fa-user"></i> {{ $berita->alumni_name }} | &nbsp;
                    <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->sm3_date)->isoFormat('DD/MM/Y') }}
                  </span>
                </h3>
                <p>{!! \Illuminate\Support\Str::limit($berita->sm3_text, 300) !!}</p>
              </div>
              <div class="col-md-12">
                <hr class="m-2">
              </div>
            </div>
            @endforeach
            {{ $news->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection