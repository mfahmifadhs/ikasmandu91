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
      <div class="col-lg-6 shuffle-item">
        <div class="card">
          <div class="form-group">
            <div class="gallery-img-container">
              <a class="gallery-popup" href="{{ asset('images/main/gallery/'. $gallery->gallery_img) }}" aria-label="gallery-img">
                <img src="{{ asset('images/main/gallery/'. $gallery->gallery_img) }}" alt="{{ $gallery->gallery_title }}" height="350" width="100%">
                <span class="gallery-icon"><i class="fas fa-eye"></i></span>
              </a>
              <div class="gallery-item-info">
                <div class="gallery-item-info-content">
                  <h3 class="gallery-item-title">
                    <a href="gallerys-single.html">{{ $gallery->gallery_title }}</a>
                  </h3>
                  <p class="gallery-cat">{{ $gallery->gallery_text }}</p>
                </div>
              </div>
            </div>
          </div><!-- shuffle item 5 end -->
          <p class="pt-0 text-capitalize">
            <i class="far fa-calendar ml-2"></i> 
              {{ \Carbon\Carbon::parse($gallery->gallery_date)->isoFormat('DD MMMM Y') }}  &ensp; | &ensp;
            <i class="far fa-folder-open"></i> {{ $gallery->category_name }}               &ensp; | &ensp;
            <i class="far fa-user"></i> {{ $gallery->alumni_name }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!--/ Container end -->
</section><!-- gallery area end -->


@endsection