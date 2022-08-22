@extends('v_admin_user.layout.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold">Buat Berita</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin-user/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin-user/menu/1') }}">Sejarah SMAN 2 Padang</a></li>
          <li class="breadcrumb-item active">Detail Sejarah SMAN 2 Padang</li>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sejarah SMAN 2 Padang</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('admin-user/sekolah/ubah-profil-sman2-padang/'. $profil->id_sub_menu_2) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar Header</label>
                <div class="col-sm-10 ">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Upload Gambar
                    <input type="hidden" class="form-control" name="old_img" value="{{ $profil->sm2_img }}"> 
                    <input type="file" class="form-control image" name="new_img"> 
                    <img id="preview-image-before-upload" src="{{ asset('images/main/profile_school/'. $profil->sm2_img) }}" style="max-height: 80px;">
                  </div><br>
                  <span class="help-block" style="font-size: 12px;">Format foto jpg/jpeg/png dan max 4 MB</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sejarah Sekolah</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="summernote" name="text">{{ $profil->sm2_text }}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary me-2" onclick="return confirm('Ubah informasi sejarah SMAN 2 Padang ?')">Ubah</button>
                  <button class="btn btn-light">Batal</button>
                </div>
              </div>
            </form>
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

  $(function () {
    // Summernote
    $('#summernote').summernote(
    {
      height: 400,
      placeholder : 'Tidak dapat menambah gambar di isi sejarah sekolah , gambar dapat di tambahkan di Gambar Header.'
    });
  })
</script>
@endsection

@endsection