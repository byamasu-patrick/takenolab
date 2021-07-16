<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Web Software Developers, Education and Learning, 01, 02, 03, 04">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>{{ config('app.name', 'takenoLAB') }}</title>
    <link rel="stylesheet" href="{{ asset('css/takeno.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/universal-style.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/rate.css') }}" media="screen">
    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/takeno.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/load_lecture_videos.js') }}"></script>
    <meta name="generator" content="takeno 3.15.3, takeno.com">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://use.fontawesome.com/194b9a665b.js"></script> -->
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Oswald:200,300,400,500,600,700|Barlow:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Archivo+Black:400">
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "images/logo.png"
    }
   </script>
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="{{ asset('/js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .profile {
          margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
          padding: 20px 0 10px 0;
          background: #fff;
        }

        .profile-userpic img {
          float: none;
          margin: 0 auto;
          width: 50%;
          height: 50%;
          -webkit-border-radius: 50% !important;
          -moz-border-radius: 50% !important;
          border-radius: 50% !important;
        }

        .profile-usertitle {
          text-align: center;
          margin-top: 20px;
        }

        .profile-usertitle-name {
          color: #5a7391;
          font-size: 16px;
          font-weight: 600;
          margin-bottom: 7px;
        }

        .profile-usertitle-job {
          text-transform: uppercase;
          color: #5b9bd1;
          font-size: 12px;
          font-weight: 600;
          margin-bottom: 15px;
        }

        .profile-userbuttons {
          text-align: center;
          margin-top: 10px;
        }

        .profile-userbuttons .btn {
          text-transform: uppercase;
          font-size: 11px;
          font-weight: 600;
          padding: 6px 15px;
          margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
          margin-right: 0px;
        }
            
        .profile-usermenu {
          margin-top: 30px;
        }

        .profile-usermenu ul li {
          border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
          border-bottom: none;
        }

        .profile-usermenu ul li a {
          color: #93a3b5;
          font-size: 14px;
          font-weight: 400;
        }

        .profile-usermenu ul li a i {
          margin-right: 8px;
          font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
          background-color: #fafcfd;
          color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
          border-bottom: none;
        }

        .profile-usermenu ul li.active a {
          color: #5b9bd1;
          background-color: #f6f9fb;
          border-left: 2px solid #5b9bd1;
          margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
          padding: 20px;
          background: #fff;
          min-height: 460px;
        }

    </style>
</head>
<body data-home-page="Home.html" data-home-page-title="Home" class="u-body">
  <header class="u-clearfix u-header" id="sec-c6bf">
    <div class="u-clearfix u-valign-middle u-sheet-1" style="margin-bottom: 0px;border-bottom: 2px solid black; padding-left: 20px; padding-right: 20px;">
        <a href="/" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500">
          <img src="{{ asset('images/logo.png') }}" class="u-logo-image u-logo-image-1" data-image-width="64">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs>
                <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect></symbol></defs>
              </svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1">
              @guest     
                @if (Route::has('login'))
                    <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ route('login') }}" style="padding: 10px 20px;">Login</a></li>
                @endif
                @if (Route::has('register'))
                    <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ route('register') }}" style="padding: 10px 20px;">Sign Up</a></li>
                @endif
              @else
                    <li class="ku-nav-item dropdown">
                                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                  {{ Auth::user()->name }}
                                              </a>

                                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                      {{ __('Logout') }}
                                                  </a>
                                                  <a class="dropdown-item" href="/{{ Auth::user()->account_type }}">
                                                      {{ __('Home') }}
                                                  </a>
                                                  <a class="dropdown-item" href="/">
                                                      {{ __('View Account') }}
                                                  </a>
                                                  <a class="dropdown-item" href="/">
                                                      {{ __('Account Settings') }}
                                                  </a>

                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                  </form>
                                              </div>
                                          </li>
                                          
              @endguest
<!--  -->
        </nav>
    </div>
  </header>
    <div id="app">

        <main style="padding-top: 0px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
