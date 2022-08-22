@extends('v_main.layout.app')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">PROFIL</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Profil</li>
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

    <div class="row text-center">
      <div class="col-12">
        <h3 class="section-sub-title">INFORMASI SAYA</h3>
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
    </div>

    <div class="row" id="form-input-data-alumni">
      <div class="col-md-12">
        <form id="contact-form" action="{{ url('main/alumni/ubah/'. $user->alumni_id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-2">
              <div class="form-group mt-2 form-group">
                <h4>Foto</h4>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="hidden" class="image" name="old_img" value="{{ $user->alumni_img }}">
                <input type="file" class="image" name="alumni_img"> <br>
                <span class="help-block" style="font-size: 12px;">Format foto jpg/jpeg/png dan max 4 MB</span>
              </div>
            </div>
            <div class="col-md-4 form-group">
              @if($user->alumni_img != null)
                <img class="img-thumbnail" id="preview-image-before-upload" src="{{ asset('images/alumni/'. $user->alumni_img) }}" 
                style="max-height: 80px;">
              @else
                <img class=" img-thumbnail profile-user-img img-fluid img-circle" id="preview-image-before-upload" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" 
                style="max-height: 60px;">
              @endif
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Nama Lengkap</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_name" value="{{ $user->alumni_name }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Jenis Kelamin</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="alumni_gender">
                  @if($user->alumni_gender == 'pria')
                  <option value="pria">Laki-laki</option>
                  <option value="wanita">Perempuan</option>
                  @else
                  <option value="wanita">Perempuan</option>
                  <option value="pria">Laki-laki</option>
                  @endif  
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Tahun Lulus</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="number" class="form-control" name="alumni_graduation_year" value="{{ $user->alumni_graduation_year }}" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Kelas</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_class" value="{{ $user->alumni_class }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Tempat Lahir</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_placeofbirth" value="{{ $user->alumni_placeofbirth }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Tanggal Lahir</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="date" class="form-control" name="alumni_dateofbirth" value="{{ $user->alumni_dateofbirth }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Email</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="email" class="form-control" name="alumni_email" value="{{ $user->alumni_email }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>No. Hp</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="number" class="form-control" name="alumni_phone_number" value="{{ $user->alumni_phone_number }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Ukuran Baju</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="alumni_size_clothes" required>
                  <?php 
                    $size = ['S','M','L','XL','XXL','XXXL','4XL','5XL']
                  ?>
                  @foreach ($size as $size)
                    <option value="{{ $size }}" {{ ( $size == $user->alumni_size_clothes) ? 'selected' : '' }}> 
                      {{ $size }} 
                    </option>
                  @endforeach
                </select> 
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Pekerjaan</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_job" value="{{ $user->alumni_job }}" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Alamat</h4>
              </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                <textarea class="form-control" name="alumni_address" rows="5">{{ $user->alumni_address }}</textarea>
              </div>
            </div>

            <!-- =============================
                    Pendidikan Terakhir
            =============================== -->
            <div class="col-md-12">
              <hr>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Pendidikan</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="alumni_last_edu" required>
                  <?php 
                    $lastedu = ['SMA','Diploma 1 (D1)','Diploma 2 (D2)','Diploma 3 (D3)','Strata 1 (S1) / Diploma 4 (D4)',
                                'Strata 2 (S2)','Strata 3 (S2)']
                  ?>
                  @foreach ($lastedu as $lastedu)
                    <option value="{{ $lastedu }}" {{ ( $lastedu == $user->alumni_last_edu) ? 'selected' : '' }}> 
                      {{ $lastedu }} 
                    </option>
                  @endforeach
                </select>  
              </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Universitas</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_univ" value="{{ $user->alumni_univ }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Prodi/Jurusan</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_major" value="{{ $user->alumni_major }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Username</h4>
              </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                <input type="hidden" name="old_username" value="{{ $user->username }}">
                <input type="text" class="form-control" name="username" placeholder="{{ $user->username }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>&nbsp;</h4>
              </div>
            </div>
            <div class="col-md-10 mt-4">
              <div class="form-group">
                <button class="btn btn-primary" onclick="return confirm('Apakah Data Sudah Benar ?')">SIMPAN</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@section('js')
<script>

  $('.image').change(function(){
    let reader = new FileReader();

    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
    
  });
</script>
@endsection

@endsection
