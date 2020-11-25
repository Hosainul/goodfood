<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('backend/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('backend/demo/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
</head>
<body>
    <div id="app">
        <div class="wrapper ">
            @if (Request::is('admin*'))
                @include('layouts.partial.sidebar')
            @endif

            <div class="main-panel">

                @if (Request::is('admin*'))
                    @include('layouts.partial.topbar')
                @endif

                @yield('content')

                @if (Request::is('admin*'))
                    @include('layouts.partial.footer')
                @endif

            </div>
          </div>
          {{-- <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
              <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
              </a>
              <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                      <span class="badge filter badge-purple" data-color="purple"></span>
                      <span class="badge filter badge-azure" data-color="azure"></span>
                      <span class="badge filter badge-green" data-color="green"></span>
                      <span class="badge filter badge-warning" data-color="orange"></span>
                      <span class="badge filter badge-danger" data-color="danger"></span>
                      <span class="badge filter badge-rose active" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                  </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-2.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-4.jpg" alt="">
                  </a>
                </li>
                <li class="button-container">
                  <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
                </li>
                <!-- <li class="header-title">Want more components?</li>
                    <li class="button-container">
                        <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                          Get the pro version
                        </a>
                    </li> -->
                <li class="button-container">
                  <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                    View Documentation
                  </a>
                </li>
                <li class="button-container github-star">
                  <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                  <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                  <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                  <br>
                  <br>
                </li>
              </ul>
            </div>
          </div> --}}
    </div>
 <!--   Core JS Files   -->
 <script src="{{asset('backend/js/core/jquery.min.js')}}"></script>
 <script src="{{asset('backend/js/core/popper.min.js')}}"></script>
 <script src="{{asset('backend/js/core/bootstrap-material-design.min.js')}}"></script>
 <script src="{{asset('backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
 <!-- Plugin for the momentJs  -->
 <script src="{{asset('backend/js/plugins/moment.min.js')}}"></script>
 <!--  Plugin for Sweet Alert -->
 <script src="{{asset('backend/js/plugins/sweetalert2.js')}}"></script>
 <!-- Forms Validations Plugin -->
 <script src="{{asset('backend/js/plugins/jquery.validate.min.js')}}"></script>
 <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
 <script src="{{asset('backend/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
 <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
 <script src="{{asset('backend/js/plugins/bootstrap-selectpicker.js')}}"></script>
 <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
 <script src="{{asset('backend/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
 <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
 <script src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
 <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
 <script src="{{asset('backend/js/plugins/bootstrap-tagsinput.js')}}"></script>
 <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
 <script src="{{asset('backend/js/plugins/jasny-bootstrap.min.js')}}"></script>
 <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
 <script src="{{asset('backend/js/plugins/fullcalendar.min.js')}}"></script>
 <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
 <script src="{{asset('backend/js/plugins/jquery-jvectormap.js')}}"></script>
 <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
 <script src="{{asset('backend/js/plugins/nouislider.min.js')}}"></script>
 <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
 <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
 <!-- Library for adding dinamically elements -->
 <script src="{{asset('backend/js/plugins/arrive.min.js')}}"></script>
 <!--  Google Maps Plugin    -->
 <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!-- Chartist JS -->
 <script src="{{asset('backend/js/plugins/chartist.min.js')}}"></script>
 <!--  Notifications Plugin    -->
 <script src="{{asset('backend/js/plugins/bootstrap-notify.js')}}"></script>
 <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="{{asset('backend/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 {!! Toastr::message() !!}

 @stack('js')
</body>
</html>
