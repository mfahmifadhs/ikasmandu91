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
          <li class="breadcrumb-item active">Tambah Alumni</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content text-capitalize">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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
          <div class="card-header">
            <h3 class="card-title font-weight-bold">Tambah Alumni</h3>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form class="form-horizontal" action="{{ url('admin-user/alumni/proses-tambah/baru') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id_alumni" value="{{ random_int(100000, 999999) }}">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="test" class="form-control" name="name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="gender" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="pria">Laki-laki</option>
                        <option value="wanita">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Hp</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phone_num">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email">
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
                      <input type="text" class="form-control" name="class">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="place_birthday">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_birthday">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ukuran Baju</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="size_clothes">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Domisili</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="domicile">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="address"></textarea> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="last_edu">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="major"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="job"> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-9">
                      <div class="btn btn-default btn-file">
                        <i class="fas fa-paperclip"></i> Upload Foto
                        <input type="file" class="form-control image" name="img_alumni"> 
                        <img id="preview-image-before-upload" src="{{ asset('images/alumni') }}" style="max-height: 80px;">
                      </div><br>
                      <span class="help-block" style="font-size: 12px;">Format foto jpg/jpeg/png dan max 4 MB</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-3 col-sm-10">
                      <button type="submit" class="btn btn-primary font-weight-bold" onclick="return confirm('Tambah data alumni ?')">
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