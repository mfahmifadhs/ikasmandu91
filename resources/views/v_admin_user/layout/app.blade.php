<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IKASMANDU 91</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist-admin/css/adminlte.css') }}">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dist-admin/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('images/main/logo-ikasmandu.png') }}" alt="Ikasmandu91" height="60" width="260">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user-circle"></i>
          <b>{{ Auth::user()->email }}</b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Kode Alumni: {{ Auth::user()->alumni_id }}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('signout') }}" class="dropdown-item dropdown-footer">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin-user/dashboard') }}" class="brand-link text-center">
      <span class="brand-text font-weight-bold">IKASMANDU 91</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/main/logo-admin-mini.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize">{{ Auth::user()->category }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin-user/dashboard') }}" class="nav-link {{ Request::is('admin-user/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header font-weight-bold">Halaman Utama</li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <img src="{{ asset('images/main/logo-title.png') }}" width="28">
              <p>Ikasmandu91</p>
            </a>
          </li>
          <li class="nav-header font-weight-bold">Menu</li>
          @foreach($menu as $menu)
          <li class="nav-item text-capitalize">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                {{ $menu->main_menu_name }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach($menu->submenu as $submenu)
              <li class="nav-item">
                <a href="{{ url('admin-user/menu/'.$submenu->id_sub_menu) }}" class="nav-link {{ Request::is('admin-user/menu/'.$submenu->id_sub_menu) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 12px;">
                    {{ $submenu->sub_menu_name }}
                  </p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Ikasmandu91</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('dist-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('dist-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dist-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist-admin/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('dist-admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dist-admin/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist-admin/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist-admin/js/pages/dashboard2.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('dist-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dist-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dist-admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('dist-admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('dist-admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@yield('js')
<script>
  $(function () {
    $("#table-1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#table-1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>
</html>
