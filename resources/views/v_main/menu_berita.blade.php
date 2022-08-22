@extends('v_main.layout.app')

@section('content')


<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">BERITA</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	<a href="#">Berita Tentang SMA 2 Padang</a>
                      </li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

        @foreach($news as $berita)
        <div class="post">
          <div class="post-media post-image">
            <img loading="lazy" src="{{ asset('images/news/'. $berita->sm3_img) }}" class="img-fluid" 
            title="{{ $berita->sm3_title }}" style="width: 100%;height: 420px;">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#">{{ $berita->alumni_name }}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#">{{ $berita->category_name }}</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i>
                  {{ \Carbon\Carbon::parse($berita->sm3_date)->isoFormat('DD MMMM Y') }}
                </span>
              </div>
              <h2 class="entry-title">
                <a href="news-single.html">{{ $berita->sm3_title }}</a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p> {!! \Illuminate\Support\Str::limit($berita->sm3_text, 500) !!}</p>
            </div>

            <div class="post-footer">
              <a href="{{ url('main/berita/detail/'. $berita->id_sub_menu_3) }}" class="btn btn-primary">BACA SELENGKAPNYA</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
        @endforeach
        {{ $news->links("pagination::bootstrap-4") }}
      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Terbaru</h3>
            <ul class="list-unstyled">
              @foreach($recent as $recent)
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="{{ url('main/berita/detail/'. $recent->id_sub_menu_3) }}">
                    <img loading="lazy" alt="img" src="{{ asset('images/news/'. $recent->sm3_img) }}">
                  </a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="#">{{ $recent->sm3_title }}</a>
                  </h4>
                </div>
              </li>
              @endforeach
            </ul>
          </div><!-- Recent post end -->

          <div class="widget">
            <h3 class="widget-title">Kategory</h3>
            <ul class="arrow nav nav-tabs">
              @foreach($category as $category)
                <li><a href="#">{{ $category->category_name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection