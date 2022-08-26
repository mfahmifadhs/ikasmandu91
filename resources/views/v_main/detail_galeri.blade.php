@extends('v_main.layout.app')

@section('content')

@foreach($galeri as $gallery)
<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">DETAIL GALERI</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item" aria-current="page">
                      	<a href="{{ url('main/galeri/daftar/semua') }}">Galeri</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	{{ $gallery->gallery_title }}
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
      <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p style="color:black;font-weight: bold; margin: auto;">{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('failed'))
        <div class="alert alert-danger">
          <p style="color:black;font-weight: bold;margin: auto;">{{ $message }}</p>
        </div>
        @endif
      </div>
      <div class="col-lg-8 mt-5 mt-lg-0 form-group">
        <h2 class="entry-title mb-4">
          {{ $gallery->gallery_title }}
        </h2>
        <div class="card mb-2">
          <a type="button" class="btn btn-default" data-toggle="modal" data-target="#gallery-{{ $gallery->id_gallery }}">
            <div class="form-group" >
              <div class="gallery-img-container">
                <div id="page-slider" class="page-slider small-bg">
                  @foreach($gallery->gallerydetail as $detail)
                    <div class="item" style="height: 500px;background-image: url('{{ asset('images/main/gallery/'. $detail->image)}}')">

                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </a>
          <div class="modal fade" id="gallery-{{ $gallery->id_gallery }}" style="margin-top:15vh;">
              <div class="modal-dialog">
                <div class="modal-content">
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
        </div>

        <span class="post-meta-date m-2"><i class="far fa-calendar"></i>
          {{ \Carbon\Carbon::parse($gallery->gallery_date)->isoFormat('DD MMMM Y') }}
        </span>

        <div class="entry-content text-capitalize m-2">
          <p>{{ $gallery->gallery_text }}</p>
        </div>

        <!-- Daftar Komentar -->
        <div id="comments" class="comments-area m-2">
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
        <div class="comments-form border-box m-2">
          <h3 class="title-normal">Tambah Komentar</h3>

          <form role="form" action="{{ url('main/galeri/komentar/tambah') }}" method="POST">
            @csrf
            <input type="hidden" name="gallery_id" value="{{ $gallery->id_gallery }}">
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
      <div class="col-lg-4 mt-5 mt-lg-0 form-group">
        <h2 class="entry-title mb-4">
          Galeri Lainya
        </h2>
        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Berita Terbaru</h3>
            <ul class="list-unstyled">
              @foreach($recent as $recent)
              <li class="d-flex align-items-center">
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="{{ url('main/galeri/detail/'. $recent->id_gallery) }}">{{ $recent->gallery_title }}</a>
                  </h4>
                </div>
              </li>
              @endforeach
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endforeach

@endsection
