@extends('v_main.layout.app')

@section('content')

<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">

      <div class="col-12">
        <div class="error-page text-center">
          <div class="error-code">
            <h2><strong>Halo !</strong></h2>
          </div>
          <div class="error-message">
            <h3>Mohon maaf, saat ini halaman ini belum tersedia !</h3>
          </div>
          <div class="error-body">
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali</a>
          </div>
        </div>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
