@extends('v_main.layout.app')

@section('content')


<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">SEJARAH</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	<a href="#">Sejarah SMA 2 Padang</a>
                      </li>
                    </ol>
                </nav>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5 mt-lg-0">    
          <img src="{{ asset('images/main/history/'. $history->sm1_img) }}" class="img-responsive" style="width:100%;">
        </div><!-- Col end -->
        <div class="col-lg-12">
          <h3 class="column-title mt-4">SEJARAH SMA 2 PADANG</h3>
          <p>{!! $history->sm1_text !!}</p>
        </div>
    </div>
  </div>
</section>



@endsection