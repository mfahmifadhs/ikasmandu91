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
            <div>
              <div class="btn-group w-100 mb-2">
                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                @foreach($category as $category)
                <a class="btn btn-info" href="javascript:void(0)" data-filter="{{ $category->id_category }}"> {{ $category->category_name }} </a>
                @endforeach
              </div>
              <div class="mb-2">
                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Acak Gambar </a>
                <div class="float-right">
                  <select class="custom-select" style="width: auto;" data-sortOrder>
                    <option value="index"> Sort by Position </option>
                    <option value="sortData"> Sort by Custom Data </option>
                  </select>
                  <div class="btn-group">
                    <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                    <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="filter-container row">
              @foreach($galeri as $galeri)
              <div class="filtr-item col-sm-2" data-category="{{ $galeri->category_id }}" data-sort="white sample">
                <a href="{{ asset('images/main/gallery/'. $galeri->image ) }}" data-toggle="lightbox" data-title="{{ $galeri->gallery_title }}">
                  <img src="{{ asset('images/main/gallery/'. $galeri->image ) }}" class="img-fluid img-thumbnail mb-2" alt="white sample"/>
                </a>
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
