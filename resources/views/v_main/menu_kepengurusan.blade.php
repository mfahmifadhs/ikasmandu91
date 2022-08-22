@extends('v_main.layout.app')

@section('content')


<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">STRUKTUR ORGANISASI</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	Profil Pengurus
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
      <div class="col-12 form-group">
        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>
          <div class="col-lg-12 col-sm-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
            <div class="project-img-container">
              <a class="gallery-popup" href="{{ asset('images/main/structure/'. $struktur->sm5_img) }}" aria-label="project-img">
                <img class="img-fluid" src="{{ asset('images/main/structure/'. $struktur->sm5_img) }}" alt="project-img" style="width:100%;">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 form-group mt-4" id="pengurus">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="section-title">Ikatan Keluarga Alumni SMA Negeri 2 Padang</h2>
            <h3 class="section-sub-title">PENGURUS IKASMANDU 91</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              @foreach($pengurus as $pengurus)
              <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0 text-capitalize">
                    {{ $pengurus->committee_name }}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7 mt-2">
                        <h2 class="lead text-capitalize"><b>{{ $pengurus->alumni_name }}</b></h2>
                        <p class="text-capitalize">
                          {!! \Illuminate\Support\Str::limit($pengurus->sm6_description, 50) !!}
                        </p>
                      </div>
                      <div class="col-5 text-center mt-4">
                        @if($pengurus->alumni_img == null)
                        <img class="profile-user-img img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil">
                        @else
                        <img class="profile-user-img img-thumbnail" src="{{ asset('images/alumni/'.$pengurus->alumni_img) }}" alt="Profil" 
                        style="width: 110px;height: 110px;">
                        @endif
                      </div>
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
</section>



@endsection