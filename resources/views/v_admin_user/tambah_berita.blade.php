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
          <li class="breadcrumb-item active">Buat Berita SMAN 2 Padang</li>
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
            <h3 class="card-title">Buat Berita</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('admin-user/berita/proses-tambah/baru') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
              @csrf
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pilih Kategori </label>
                <div class="col-sm-10">
                  <select class="form-control" name="category_id" required>
                    <option value="">-- Pilih Kategori Berita --</option>
                    @foreach($category as $category)
                    <option value="{{$category->id_category}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sm3_title" style="text-transform: capitalize;" placeholder="Masukkan Judul Berita" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gambar Header </label>
                <div class="col-sm-10">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Upload Gambar Header
                    <input type="file" class="form-control image" name="sm3_img"> 
                    <img id="preview-image-before-upload" style="max-height: 80px;">
                  </div><br>
                  <span class="help-block" style="font-size: 12px;">Ukuran Rekomendasi 750px x 450 px ,Format foto jpg/jpeg/png dan max 4 MB</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi Berita </label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="summernote" name="text"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary me-2" onclick="return confirm('Yakin ingin menambah berita baru?')">Tambah</button>
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
      height: 200,
      placeholder : 'Tidak dapat menambah gambar di isi berita, gambar dapat di tambahkan di Gambar Header.'
    });
  })
</script>
@endsection

@endsection