@extends('v_admin_user.layout.app')

@section('content')

@foreach($galeri as $gallery)
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
          <li class="breadcrumb-item"><a href="{{ url('admin-user/galeri/daftar/semua') }}">Galeri</a></li>
          <li class="breadcrumb-item active">Galeri {{ $gallery->gallery_title }}</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h5 class="text-uppercase font-weight-bold">{{ $gallery->gallery_title }}</h5>
            <hr>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div id="gal-{{ $gallery->id_gallery }}" class="carousel slide text-center" data-ride="carousel" style="max-width:100%;">
                <div class="carousel-inner">
                  @foreach($gallery->gallerydetail as $key => $detail)
                    <div class="carousel-item <?php if($key==0){echo "active";} ?>">
                      <img class="d-block w-100 img-thumbnail" src="{{ asset('images/main/gallery/'. $detail->image)}}">
                    </div>
                  @endforeach
                </div>
                  <a class="carousel-control-prev" href="#gal-{{ $gallery->id_gallery }}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#gal-{{ $gallery->id_gallery }}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
            </div>
            <div class="post text-capitalize">
              {{ $gallery->gallery_text }}
            </div>
            <p class="text-sm mt-4">
                @if($gallery->gallery_isdelete == 'false')
                <!-- <a href="{{ url('admin-user/berita/hapus/'. $gallery->id_gallery) }}" class="btn btn-danger" onclick="return confirm('Hapus gambar ini ?')">
                  <i class="fas fa-trash"> Hapus</i>
                </a> -->
                @else
                <a href="{{ url('admin-user/berita/restore/'. $gallery->id_gallery) }}" class="btn btn-primary" onclick="return confirm('Pulihkan gambar ini ?')">
                  <i class="fas fa-trash"> Pulihkan</i>
                </a>
                @endif
              </p>
          </div>
          <div class="col-md-8">
            <div class="card">
             <p class="m-2"> <i class="fas fa-thumbs-up"></i> 0 orang menyukai gambar ini</p>
             <p class="m-2"> <i class="fas fa-comment"></i> Komentar</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endforeach


@endsection
