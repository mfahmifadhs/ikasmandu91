@extends('v_main.layout.app')

@section('content')


<div id="banner-area" class="banner-area" style="background-image:url(/images/main/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">INPUT DATA ALUMNI</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                      	<a href="#">Input Data Alumni</a>
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

    <div class="row text-center">
      <div class="col-12">
        <h3 class="section-sub-title">INPUT DATA ALUMNI</h3>
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

    <!--/ Title row end -->
    @foreach($rules as $rules)
    <div class="col-12">
      {!! $rules->rules_name !!}
    </div>
    @endforeach
    <hr>

    <div class="row" id="form-input-data-alumni">
      <div class="col-md-12">
        <form id="contact-form" action="{{ url('main/alumni/proses-tambah/baru') }}" method="POST" enctype="multipart/form-data">
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
                <input type="file" class="image" name="alumni_img"> <br>
                <span class="help-block" style="font-size: 12px;">Format foto jpg/jpeg/png dan max 4 MB</span>
              </div>
            </div>
            <div class="col-md-4 form-group">
                <img class=" img-thumbnail profile-user-img img-fluid img-circle" id="preview-image-before-upload" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" 
                style="max-height: 60px;">
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Nama Lengkap</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_name" placeholder="Nama Lengkap" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Jenis Kelamin</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="alumni_gender" required>
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="pria">Laki-laki</option>
                  <option value="wanita">Perempuan</option>
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
                <input type="number" class="form-control" name="alumni_graduation_year" value="1991" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Kelas</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_class" placeholder="Contoh: Fisika, Biologi, Kimia" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Tempat Lahir</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_placeofbirth" placeholder="Tempat Lahir" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Tanggal Lahir</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="date" class="form-control" name="alumni_dateofbirth" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Email</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="email" class="form-control" name="alumni_email" placeholder="Alamat Email" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>No. Hp</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="number" class="form-control" name="alumni_phone_number" placeholder="No Hp Aktif" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Ukuran Baju</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="alumni_size_clothes">
                  <option>-- Pilih Ukuran Baju --</option>
                  <option>S</option>
                  <option>M</option>
                  <option>L</option>
                  <option>XL</option>
                  <option>XXL</option>
                  <option>XXXL</option>
                  <option>4XL</option>
                  <option>5XL</option>
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
                <input type="text" class="form-control" name="alumni_job" placeholder="Pekerjaan Saat Ini" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Alamat</h4>
              </div>
            </div>
            <div class="col-md-10">
              <div class="form-group">
                <textarea class="form-control" name="alumni_address" placeholder="Alamat Tempat Tinggal Saat Ini" rows="5"></textarea>
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
                  <option value="">-- Pilih Pendidikan Terakhir --</option>
                  <option>SMA</option>
                  <option>Diploma 1 (D1)</option>
                  <option>Diploma 2 (D2)</option>
                  <option>Diploma 3 (D3)</option>
                  <option>Strata 1 (S1) / Diploma 4 (D4)</option>
                  <option>Strata 2 (S2)</option>
                  <option>Strata 3 (S2)</option>
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
                <input type="text" class="form-control" name="alumni_univ" placeholder="Nama Universitas">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group mt-2">
                <h4>Prodi/Jurusan</h4>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input type="text" class="form-control" name="alumni_major" placeholder="Program Studi / Jurusan">
              </div>
            </div>
            <div class="col-md-10 mt-4">
              <div class="form-group">
                <button class="btn btn-primary" onclick="return confirm('Apakah Data Sudah Benar ?')">SUBMIT</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

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