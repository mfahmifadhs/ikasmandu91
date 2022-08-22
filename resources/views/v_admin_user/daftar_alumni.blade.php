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
          <li class="breadcrumb-item active">Daftar Alumni</li>
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
        <div class="float-right">
          <a href="{{ url('admin-user/alumni/tambah/baru') }}" class="btn btn-outline-primary btn-block">
            <i class="fas fa-plus-circle">  </i> Tambah Alumni
          </a>
        </div>
      </div>
      <div class="col-md-12 form-group">
        <div class="card">
          <div class= "card-header">
            <h3 class="card-title font-weight-bold mt-2">Daftar Alumni</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-default" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="table-1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 20%;">Nama</th>
                  <th style="width: 15%;">No. Hp</th>
                  <th style="width: 15%;">Domisili</th>
                  <th style="width: 15%;"></th>
                </tr>
              </thead>
              <?php $no = 1;?>
              <tbody class="text-capitalize">
                @foreach($alumni as $alumni)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $alumni->alumni_name }}</td>
                  <td>{{ $alumni->alumni_phone_number }}</td>
                  <td>{{ $alumni->alumni_domicile }}</td>
                  <td class="text-center">
                    <a href="{{ url('admin-user/alumni/detail/'.$alumni->id_alumni) }}" class="btn btn-primary btn-xs"><i class="fas fa-user"></i> <br>Detail</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 20%;">Nama</th>
                  <th style="width: 15%;">No. Hp</th>
                  <th style="width: 15%;">Domisili</th>
                  <th style="width: 15%;"></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

@endsection