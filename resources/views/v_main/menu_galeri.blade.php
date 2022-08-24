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
                    </div><!-- Item 1 end -->
                    @endforeach
                  </div><!-- Page slider end-->
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
  <!--/ Container end -->
</section><!-- gallery area end -->


@endsection
