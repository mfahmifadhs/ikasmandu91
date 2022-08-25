@extends('v_main.layout.app')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">GALERI</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	<a href="#">Galeri</a>
                      </li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->

<section id="gallery-area" class="gallery-area solid-bg">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h2 class="section-title">GALERI AKTIVITAS & KEGIATAN</h2>
        <h3 class="section-sub-title">GALERI IKASMANDU 91</h3>
      </div>
    </div>

    <div class="row">
      @foreach($galeri as $gallery)
      <div class="col-lg-6 mt-5 mt-lg-0 form-group">
          <div class="card">
            <a type="button" class="btn btn-default" data-toggle="modal" data-target="#gallery-{{ $gallery->id_gallery }}">
              <div class="form-group">
                <div class="gallery-img-container">
                  <div id="page-slider" class="page-slider small-bg">
                    @foreach($gallery->gallerydetail as $detail)
                    <div class="item" style="background-image: url('{{ asset('images/main/gallery/'. $detail->image)}}')">
                      <div class="container">
                        <div class="box-slider-content">
                          <div class="box-slider-text">
                            <h2 class="box-slide-title">{{ $gallery->gallery_title }}</h2>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </a>
            <div class="modal fade" id="gallery-{{ $gallery->id_gallery }}" style="margin-top:15vh;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">{{ $gallery->id_gallery }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="carouselExample{{ $gallery->id_gallery }}" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        @foreach($gallery->gallerydetail as $key => $detail)
                            <div class="carousel-item <?php if($key==0){echo "active";} ?>">
                              <img class="d-block w-100" src="{{ asset('images/main/gallery/'. $detail->image)}}">
                            </div>
                        @endforeach
                      </div>
                        <a class="carousel-control-prev" href="#carouselExample{{ $gallery->id_gallery }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample{{ $gallery->id_gallery }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="pt-0 text-capitalize">
              <i class="far fa-calendar ml-2"></i>
                {{ \Carbon\Carbon::parse($gallery->gallery_date)->isoFormat('DD MMMM Y') }}  &ensp; | &ensp;
              <i class="far fa-folder-open"></i> {{ $gallery->category_name }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
