@extends('v_main.layout.app')

@section('content')

<section id="main-container" class="main-container">
  <div class="container">
    <form id="contact-form" action="{{ url('main/alumni/proses-ganti-password/'. $id) }}" method="POST">
      @csrf
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
        <div class="col-md-3">
          <div class="form-group mt-2">
            <h4>Password lama</h4>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <a type="button" onclick="oldPass()"><i class="fas fa-eye"></i></a>
              </span>
            </div>
            <input type="password" id="old_pass" name="old_pass" class="form-control" placeholder="Minimal 8 karakter" minlength="8">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group mt-2">
            <h4>Password Baru</h4>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <a type="button" onclick="newPass()"><i class="fas fa-eye"></i></a>
              </span>
            </div>
            <input type="password" id="new_pass" name="new_pass" class="form-control" placeholder="Minimal 8 karakter" minlength="8">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group mt-2">
            <h4>&nbsp;</h4>
          </div>
        </div>
        <div class="col-md-9 mt-4">
          <div class="form-group">
            <button class="btn btn-primary" onclick="return confirm('Apakah Data Sudah Benar ?')">UBAH PASSWORD</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</section>

@section('js')
<script>
  function oldPass() {
    var x = document.getElementById("old_pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function newPass() {
    var x = document.getElementById("new_pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
@endsection

@endsection
