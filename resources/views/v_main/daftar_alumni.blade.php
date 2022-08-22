@extends('v_main.layout.app')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Alumni SMAN 2 Padang</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	<a href="#">Alumni SMAN 2 Padang</a>
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
    <div class="col-12 form-group">
      <form action="{{ url('main/alumni/cari/informasi') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <label>Cari Data Alumni : </label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <select class="form-control form-control-lg select2-alumni" name="id_alumni"></select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <button class="btn btn-primary">CARI ALUMNI</button>
              <a href="{{ url('main/alumni/daftar/semua') }}" class="btn btn-primary"><i class="fas fa-sync"></i></a>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="col-12 form-group">
      <div class="row">
        @foreach($alumni as $alumni)
        <div class="col-md-4 form-group">
          <a type="button" data-toggle="modal" data-target="#detail-alumni{{$alumni->id_alumni}}">
            <div class="card">
              <div class="card-body pb-0 text-center">
                <h6 class="card-title">{{ $alumni->alumni_name }}</h6>
                @if($alumni->alumni_img == null)
                  <img class="profile-user-img img-circle" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil"
                  style="width: 110px;height: 110px;">
                @else
                  <img class="profile-user-img img-circle" src="{{ asset('images/alumni/'.$alumni->alumni_img) }}" alt="Profil" 
                  style="width: 110px;height: 110px;">
                @endif
                <p class="pt-2">
                  Angkatan {{ $alumni->alumni_graduation_year }} &ensp; | &ensp;
                  Kelas    {{ $alumni->alumni_class }}
                </p>
              </div>
            </div>
          </a>
        </div>     
        <!-- Modal -->
        <div class="modal fade" id="detail-alumni{{$alumni->id_alumni}}" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top: 10vh;padding-bottom:10vh;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $alumni->alumni_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="text-center">
                  @if($alumni->alumni_img == null)
                  <img class="profile-user-img img-thumbnail" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil"
                  style="width: 50px;height: 50px;">
                  @else
                  <img class="profile-user-img img-thumbnail" src="{{ asset('images/alumni/'.$alumni->alumni_img) }}" alt="Profil" 
                  style="width: 50px;height: 50px;">
                  @endif
                </p>
                <div class="row text-capitalize">
                  <div class="col-sm-6 form-group">
                    <label><b>Nama Lengkap :</b></label>
                    <p>{{ $alumni->alumni_name }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Jenis Kelamin :</b></label>
                    <p>{{ $alumni->alumni_gender }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Email :</b></label>
                    <p class="text-lowercase">{{ $alumni->alumni_email }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Tahun Angkatan :</b></label>
                    <p>{{ $alumni->alumni_graduation_year }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Kelas :</b></label>
                    <p>{{ $alumni->alumni_class }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Pendidikan Terakhir :</b></label>
                    <p>{{ $alumni->alumni_last_edu }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Universitas :</b></label>
                    <p>{{ $alumni->alumni_univ }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Jurusan/Prodi :</b></label>
                    <p>{{ $alumni->alumni_major }}</p>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label><b>Pekerjaan Saat Ini :</b></label>
                    <p>{{ $alumni->alumni_job }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

@section('js')

<script>
  $(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // Select-2
    $(".select2-alumni").select2({
      placeholder: "Kata kunci : Nama / Tahun Angkatan /",
      ajax: { 
        url: "{{ url('main/select2-alumni') }}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term // search term
          };
        },
        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      }
    });

  });
</script>

@endsection


@endsection