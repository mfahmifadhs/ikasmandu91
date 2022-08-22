<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Ikatan Alumni SMA 2 Padang</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="{{ asset('images/main/logo-title.png') }}">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/bootstrap/bootstrap.min.css') }}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/fontawesome/css/all.min.css') }}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/animate-css/animate.css') }}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/slick/slick-theme.css') }}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/colorbox/colorbox.css') }}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('dist-main/css/style.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('dist-main/plugins/select2/css/select2.min.css') }}">

</head>
<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">Indonesia</p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href=#>
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href=#>
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href=#>
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-two">
  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                
                <div class="logo">
                    <a class="d-block" href="{{ url('/') }}">
                      <img loading="lazy" src="{{ asset('images/main/logo-ikasmandu.png') }}" alt="Ikatan Keluarga SMA Negeri 2 Padang">
                    </a>
                </div><!-- logo end -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav ml-auto align-items-center">
                      <li class="nav-item dropdown active">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @foreach($mainmenu as $menu1)
                              @if($menu1->id_main_menu == 1)
                                {{ $menu1->main_menu_name }}
                              @endif
                            @endforeach
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu" role="menu"> 
                            @foreach($submenu as $sm1)
                              @if($sm1->main_menu_id == 1 && $sm1->id_sub_menu != 2)
                                <li>
                                  <a href="{{ url('main/menu/'. $sm1->id_sub_menu) }}">
                                    {{$sm1->sub_menu_name}}
                                  </a>
                                </li>
                              @endif
                            @endforeach
                          </ul>
                      </li>

                      <!-- <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @foreach($mainmenu as $menu2)
                              @if($menu2->id_main_menu == 2)
                                {{ $menu2->main_menu_name }}
                              @endif
                            @endforeach
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            @foreach($submenu as $sm2)
                              @if($sm2->main_menu_id == 2)
                                <li>
                                  <a href="{{ url('main/menu/'. $sm2->id_sub_menu) }}">
                                    {{$sm2->sub_menu_name}}
                                  </a>
                                </li>
                              @endif
                            @endforeach
                          </ul>
                      </li> -->
              
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @foreach($mainmenu as $menu3)
                              @if($menu3->id_main_menu == 3)
                                {{ $menu3->main_menu_name }}
                              @endif
                            @endforeach 
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            @foreach($submenu as $sm3)
                              @if($sm3->main_menu_id == 3)
                                <li>
                                  <a href="#">
                                    {{$sm3->sub_menu_name}}
                                  </a>
                                </li>
                              @endif
                            @endforeach
                          </ul>
                      </li>
              
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('main/menu/11') }}">
                          @foreach($mainmenu as $menu4)
                            @if($menu4->id_main_menu == 4)
                              {{ $menu4->main_menu_name }}
                            @endif
                          @endforeach
                        </a>
                      </li>

                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Database Alumni <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('main/menu/12') }}">Cari Data Alumni</a></li>
                            @if( Auth::user() != true)
                              <li><a href="{{ url('main/alumni/tambah/baru') }}">Input Data Alumni</a></li>
                            @endif
                          </ul>
                      </li>

                      @if(Auth::user() == null)
                      <li class="header-get-a-login">
                        <a class="btn btn-primary" href="{{ url('login') }}">
                          <b style="color: white;">Masuk</b>
                        </a>
                      </li>
                      @elseif(Auth::user() != null)
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <button class="btn btn-primary" style="font-size: 12px;">
                              {{ Auth::user()->username }} <i class="fa fa-angle-down"></i>
                            </button>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->category == 'admin user')
                              <li><a href="{{ url('admin-user/dashboard') }}">Dashboard</a></li>
                            @elseif(Auth::user()->category == 'user')
                            <li><a href="{{ url('main/alumni/profil/'. Auth::user()->id) }}">Profil</a></li>
                            <li><a href="{{ url('main/alumni/ganti-password/'. Auth::user()->id) }}">Ubah Password</a></li>
                            @endif
                            <li>
                              <a href="{{ url('signout') }}">Keluar</a>
                            </li>
                          </ul>
                        </li>
                      @endif

                    </ul>
                </div>
              </nav>
          </div>
        </div>
    </div>

  </div>
</header>

@yield('content')

  <footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            <img loading="lazy" width="100%" class="footer-logo ml-0" src="{{ asset('images/main/logo-ikasmandu.png') }}" 
            alt="Logo Ikatan Keluarga Alumni SMA 2 Padang">
            <!-- <p>Tentang Ikasmandu 91</p> -->
            <div class="footer-social">
              <ul>
                <li><a href="#" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="#" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Tentang</h3>
            <div class="about">
              IKASMANDU 91 atau Ikatan Keluarga Alumni SMAN Padang adalah perkumpulan alumni SMAN 2 Padang.
              Dengan adanya IKASMANDU 91, akan menjadi tali silaturahmi antar alumni.
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Kegiatan</h3>
            <ul class="list-arrow">
              @foreach($submenu as $sm3)
                @if($sm3->main_menu_id == 3)
                  <li>
                    <a href="#">
                      {{$sm3->sub_menu_name}}
                    </a>
                  </li>
                @endif
              @endforeach
            </ul>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info text-center text-md-left">
              <span>Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script> Ikatan Keluarga Alumni SMA Negeri 2 Padang</span>
            </div>
          </div>
          
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset('dist-main/plugins/jQuery/jquery.min.js') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('dist-main/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('dist-main/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('dist-main/plugins/slick/slick-animation.min.js') }}"></script>
  <!-- Color box -->
  <script src="{{ asset('dist-main/plugins/colorbox/jquery.colorbox.js') }}"></script>
  <!-- shuffle -->
  <script src="{{ asset('dist-main/plugins/shuffle/shuffle.min.js') }}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{ asset('dist-main/plugins/google-map/map.js') }}" defer></script>

  <!-- Template custom -->
  <script src="{{ asset('dist-main/js/script.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('dist-main/plugins/select2/js/select2.full.min.js') }}"></script>

  @yield('js')

  </div><!-- Body inner end -->
  </body>

  </html>