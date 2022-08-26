@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Galeri</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Galeri</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p class="fw-light" style="margin: auto;">{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('failed'))
        <div class="alert alert-danger">
          <p class="fw-light" style="margin: auto;">{{ $message }}</p>
        </div>
        @endif
      </div>
      <div class="col-md-12 form-group">
        <div class="card-outline">
          <div class="card-header">
            <h3 class="card-title mt-2">Galeri IKASMANDU 91</h3>
            <div class="card-tools">
              <a href="{{ url('admin-user/galeri/tambah/baru') }}" class="btn btn-outline-success btn-block">
                <i class="fas fa-plus-circle">  </i> Tambah Gambar
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              @foreach($galeri as $gallery)
              <div class="col-md-4 form-group">
                <a type="button" data-toggle="modal" data-target="#gallery-{{ $gallery->id_gallery }}">
                  <div class="form-group">
                    <div id="gal-{{ $gallery->id_gallery }}" class="carousel slide" data-ride="carousel">
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
                </a>
              </div>
              <div class="modal fade" id="gallery-{{ $gallery->id_gallery }}" style="margin-top:15vh;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div id="carouselExample{{ $gallery->id_gallery }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <a href="{{ url('admin-user/galeri/detail/'. $gallery->id_gallery) }}">
                          @foreach($gallery->gallerydetail as $key => $detail)
                            <div class="carousel-item <?php if($key==0){echo "active";} ?>">
                              <img class="d-block w-100" src="{{ asset('images/main/gallery/'. $detail->image)}}">
                            </div>
                          @endforeach
                          </a>
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
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@section('js')
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endsection

@endsection
