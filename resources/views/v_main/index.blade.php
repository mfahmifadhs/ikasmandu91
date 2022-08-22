@extends('v_main.layout.app')

@section('content')

<div class="banner-carousel banner-carousel-1 mb-0">
  <div class="banner-carousel-item" style="background-image:url(images/main/slider/bg1.jpg)">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h3 class="slide-sub-title" data-animation-in="slideInRight">SELAMAT DATANG</h3>
                <h2 class="slide-title-box" data-animation-in="slideInDown">IKATAN KELUARGA ALUMNI SMA NEGERI 2 PADANG ANGKATAN 1991</h2>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url(images/main/slider/bg2.jpg)">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">SELAMAT DATANG</h3>
                <h2 class="slide-title-box" data-animation-in="slideInDown">IKATAN KELUARGA ALUMNI SMA NEGERI 2 PADANG ANGKATAN 1991</h2>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url(images/main/slider/bg3.jpg)">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h3 class="slide-sub-title" data-animation-in="fadeIn">SELAMAT DATANG</h3>
                <h2 class="slide-title-box" data-animation-in="slideInDown">IKATAN KELUARGA ALUMNI SMA 2 NEGERI PADANG ANGKATAN 1991</h2>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">Selamat Datang Alumni SMA Negeri 2 Padang !</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">ALUMNI SMA Negeri 2 PADANG</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

@foreach($opening as $opening)
<section id="kata-sambutan" class="opening">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
          <h3 class="into-sub-title">Sambutan Ketua Umum</h3>
        </div><!-- Col end -->
        <div class="col-lg-6 mt-4 mt-lg-0">
          <img src="https://img.freepik.com/free-vector/leader-concept-illustration_114360-7479.jpg?w=1060&t=st=1660615264~exp=1660615864~hmac=493d14c71aef45bfec9d26043f736a5d262dec8bb81e8c65fb0b434ff6a14763" class="img-responsive" style="width:100%;">
        </div><!-- Col end -->

        <div class="col-lg-6">
          <div class="ts-intro">
              <h2 class="into-title mt-4">{{ $opening->sm4_title }}</h2>
              <h3 class="into-sub-title">Bersama Dalam Harmonisasi</h3>
              <p>{!! $opening->sm4_text !!}</p>
          </div><!-- Intro box end -->
        </div><!-- Col end -->

    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->
@endforeach

<section class="content pb-0">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="column-title">Apa Kata Mereka ?</h3>

          <div id="testimonial-slide" class="testimonial-slide">
            @foreach($response as $response)
              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                      {{ $response->response }}
                    </span>

                    <div class="quote-item-footer">
                      <img loading="lazy" class="testimonial-thumb" src="{{ asset('images/alumni/'.$response->alumni_img)}}">
                      <div class="quote-item-info">
                          <h3 class="quote-author">{{ $response->alumni_name }}</h3>
                          <span class="quote-subtext">Alumni Tahun {{ $response->alumni_graduation_year }}</span>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

    </div>
  </div>
</section>

<section id="banner-area" class="banner-area pb-0">
  <div class="container">

    <div class="row">
        <div class="col-lg-12">
          <img loading="lazy" class="img-fluid" src="{{ asset('images/main/dashboard/banner-2.jpg') }}" alt="service-avater-image">
        </div>
    </div>

  </div>
  <!--/ Container end -->
</section><!-- Service end -->

<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Kegiatan Ikatan Keluarga Alumni SMA 2 Negeri Padang</h2>
          <h3 class="section-sub-title">LIPUTAN KEGIATAN</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      @foreach($news as $news)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="{{ url('main/berita/detail/'. $news->id_sub_menu_3) }}" class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="{{ asset('images/news/'. $news->sm3_img) }}" 
                    title="{{ $news->sm3_title }}" style="width: 100%;height: 210px;">
                </a>
              </div>
              <div class="post-body">
                <div class="latest-post-meta">
                    <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> {{ $news->sm3_time }} / {{ $news->sm3_date }}
                    </span>
                </div>
                <h4 class="post-title">
                    <a href="{{ url('main/berita/detail/'.$news->id_sub_menu_3) }}" class="d-inline-block">
                      {{ $news->sm3_title }}
                    </a>
                </h4>
              </div>
          </div>
        </div>
      @endforeach
    </div>
    <!--/ Content row end -->

    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="{{ url('main/berita/daftar/semua') }}">LIHAT SEMUANYA</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->


@endsection