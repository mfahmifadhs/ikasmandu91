@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Alumni</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin-user/alumni/daftar/semua') }}">Daftar Alumni</a></li>
          <li class="breadcrumb-item active">Detail Alumni</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content text-capitalize">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              @if($alumni->alumni_img == null)
              <img class="profile-user-img img-fluid img-circle" src="https://cdn-icons-png.flaticon.com/512/599/599305.png" alt="Profil">
              @else
              <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/alumni/'.$alumni-> alumni_img) }}" alt="Profil" 
              style="width: 135px;height: 130px;">
              @endif
            </div>

            <h3 class="profile-username text-center">{{ $alumni->alumni_name }}</h3>

            <p class="text-muted text-center">Alumni SMAN 2 Padang Angkatan 1991</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>No. Hp</b> <a class="float-right">{{ $alumni->alumni_phone_number }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $alumni->alumni_email }}</a>
              </li>
              <li class="list-group-item">
                <b>Domisili</b> <a class="float-right">{{ $alumni->alumni_domicile }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="col-sm-12">
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
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab">Biodata Alumni</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form class="form-horizontal" action="{{ url('admin-user/alumni/proses-ubah/'. $alumni->id_alumni) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="is_approve">
                        @if($alumni->is_approve == 1)
                        <option value="1">Diterima</option>
                        <option value="0">Ditolak</option>
                        @else
                        <option value="0">Ditolak</option>
                        <option value="1">Diterima</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="test" class="form-control" name="name" value="{{ $alumni->alumni_name }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="gender">
                        <option value="{{ $alumni->alumni_gender }}">{{ $alumni->alumni_gender }}</option>
                        @if($alumni->alumni_gender == 'pria')
                        <option value="wanita">Perempuan</option>
                        @elseif($alumni->alumni_gender == 'wanita')
                        <option value="pria">Laki-laki</option>
                        @else
                        <option value="wanita">Perempuan</option>
                        <option value="pria">Laki-laki</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Hp</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phone_num" value="{{ $alumni->alumni_phone_number }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" value="{{ $alumni->alumni_email }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="graduation_year" value="1991" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="class" value="{{ $alumni->alumni_class }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="place_birthday" value="{{ $alumni->alumni_placeofbirth }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_birthday" value="{{ $alumni->alumni_dateofbirth }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ukuran Baju</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="size_clothes" value="{{ $alumni->alumni_size_clothes }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Domisili</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="domicile" value="{{ $alumni->alumni_domicile }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="address" >{{ $alumni->alumni_address }}</textarea> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="last_edu" value="{{ $alumni->alumni_last_edu }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="major" value="{{ $alumni->alumni_major }}"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="job" value="{{ $alumni->alumni_job }}"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                      <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Upload Foto
                        <input type="hidden" class="form-control image" name="img_old" value="{{ $alumni->alumni_img }}"> 
                        <input type="file" class="form-control image" name="img_alumni"> 
                        <img id="preview-image-before-upload" src="{{ asset('images/alumni/'. $alumni->alumni_img) }}" style="max-height: 80px;">
                      </div><br>
                      <span class="help-block" style="font-size: 12px;">Format foto jpg/jpeg/png dan max 4 MB</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-3 col-sm-10">
                      <button type="submit" class="btn btn-primary font-weight-bold" onclick="return confirm('Ubah informasi alumni ?')">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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