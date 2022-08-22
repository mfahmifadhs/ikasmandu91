@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Detail Berita</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin-user/berita/daftar/semua') }}">Daftar Berita</a></li>
          <li class="breadcrumb-item active">Detail Berita {{ $news->id_sub_menu_3 }}</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card">        <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
          <div class="row">
            <div class="col-12">
              <div class="post text-capitalize">
                <p>
                  {!! $news->sm3_text !!}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
          <h5 class="text-success text-capitalize">{{ $news->sm3_title }}</h5>
          <p class="text-muted">
            <img src="{{ asset('images/news/'. $news->sm3_img) }}" style="width: 100%;max-height: 500px;">
          </p>
          <br>
          <div class="text-muted text-capitalize">
            <p class="text-sm">Kategori Berita
              <b class="d-block">{{ $news->category_name }}</b>
            </p>
            <p class="text-sm">Penulis
              <b class="d-block">{{ $news->alumni_name }}</b>
            </p>
            <p class="text-sm">Tanggal
              <b class="d-block">{{ \Carbon\Carbon::parse($news->sm3_date)->isoFormat('DD/MM/Y') }}</b>
            </p>
            <p class="text-sm mt-4">
              @if($news->sm3_isdelete == 'false')
              <a href="{{ url('admin-user/berita/hapus/'. $news->id_sub_menu_3) }}" class="btn btn-danger" onclick="return confirm('Hapus berita ini ?')">
                <i class="fas fa-trash"> Hapus</i>
              </a>
              @else
              <a href="{{ url('admin-user/berita/restore/'. $news->id_sub_menu_3) }}" class="btn btn-primary" onclick="return confirm('Pulihkan berita ini ?')">
                <i class="fas fa-trash"> Pulihkan</i>
              </a>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</section>

@endsection