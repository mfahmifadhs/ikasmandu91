@extends('v_main.layout.app')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">DETAIL BERITA</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item" aria-current="page">
                      	<a href="{{ url('main/berita/daftar/semua') }}">Berita</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	{{ $news->sm3_title }}
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

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <h2 class="entry-title mb-4">
            {{ $news->sm3_title }}
          </h2>
          <div class="post-media post-image">
            <img loading="lazy" src="{{ asset('images/news/'. $news->sm3_img) }}" class="img-fluid" alt="post-image">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#">{{ $news->alumni_name }}</a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#">{{ $news->category_name }}</a>
                </span>
                <span class="post-meta-date"><i class="far fa-calendar"></i>
                  {{ \Carbon\Carbon::parse($news->sm3_date)->isoFormat('DD MMMM Y') }}
                </span>
              </div>
            </div><!-- header end -->

            <div class="entry-content">
              <p>{!! $news->sm3_text !!}</p>
            </div>

            <!-- Daftar Komentar -->
            <div id="comments" class="comments-area">
              <h3 class="comments-heading">{{ $comments->count('id_comment') }} Komentar</h3>
              <ul class="comments-list">
                @foreach($comments as $comment)
                <li>
                  <div class="comment d-flex">
                    @if($comment->alumni_img == null)
                    <img class="profile-user-img img-fluid img-circle mr-2" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil"
                    style="width: 80px;height: 80px;">
                    @else
                    <img class="profile-user-img img-fluid img-circle mr-2" src="{{ asset('images/alumni/'.$comment->alumni_img) }}" alt="Profil" 
                    style="width: 80px;height: 80px;">
                    @endif
                    <div class="comment-body text-capitalize">
                      <div class="meta-data">
                        <span class="comment-author mr-3">{{ $comment->alumni_name }}</span>
                        <span class="comment-date float-right">
                          {{ \Carbon\Carbon::parse($comment->comment_date)->isoFormat('DD MMMM YYYY H:mm z') }}
                        </span>
                      </div>
                      <div class="comment-content">
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </div>
                  </div>
                </li> 
                @endforeach
              </ul>
            </div>

            <!-- Tambah Komentar -->
            @if(Auth::user() != null)
            <div class="comments-form border-box">
              <h3 class="title-normal">Tambah Komentar</h3>

              <form role="form" action="{{ url('main/berita/komentar/tambah') }}" method="POST">
                @csrf
                <input type="hidden" name="id_news" value="{{ $news->id_sub_menu_3 }}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="message" class="w-100">
                        <textarea class="form-control required-field" id="message" placeholder="Komentar... " rows="10" name="comment" required></textarea></label>
                    </div>
                  </div>
                </div>
                <div class="clearfix">
                  <button class="btn btn-primary" type="submit"  onclick="return confirm('Tambahkan Komentar ?')" >Tambah Komentar</button>
                </div>
              </form>
            </div>
            @endif

          </div>
        </div>
      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Berita Terbaru</h3>
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

          </div>

          <div class="widget">
            <h3 class="widget-title">Kategori</h3>
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