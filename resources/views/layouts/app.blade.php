<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">


    <title>Doctor</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/color.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css') }}">

    <!-- Percent Circle -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/percircle/css/percircle.css')}}">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/chart/chartist/chartist.min.css') }}">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.print.css') }}" media='print'>


    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/dropify/css/dropify.min.css') }}">

    <!-- Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/color-switcher/color-switcher.min.css') }}">

    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Bootstrap 5 Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    {{-- For Icon  --}}
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
    <div class="main-menu">
        <header class="header">
            <a href="{{ url('/home') }}" class="logo pt-5" style="font-family: cursive;">
                <!-- <img src="{{ asset('asset/img/logo.png') }}" style="width:150px" class="img-fluid" /> -->
                <h2 class="text-center">Doctor
                    <i class="menu-icon fa fa-leaf"></i>
                </h2>
            </a>
            <button type="button" class="button-close fa fa-times js__menu_close" style="color: #03ACF0;"></button>
            <div class="user">
                <h5 class="name"><a class="text-white fs-2" href="#"></a></h5>
                <!-- /.name -->
                <div class="control-wrap js__drop_down">
                    <i class="fa fa-aret-down "></i>
                    <div class="control-list">
                        <div class="control-item"><a class="dropdown-item font" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- /.control-list -->
                </div>
                <!-- /.control-wrap -->
            </div>
            <!-- /.user -->
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation ">
                <!-- /.title -->
                <ul class="menu js__accordion">
                    <li>
                        <a class="text-white waves-effect" href="/home"><i class="text-white menu-icon fa fa-product-hunt"></i><span>Dashboard</span></a>
                    </li>
                    @role("Admin")
                    <li>
                        <a class="text-white waves-effect" href="{{route('city.index')}}"><i class="text-white menu-icon bi bi-buildings"></i><span>City</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="{{route('hospital.index')}}"><i class="text-white menu-icon bi bi-hospital-fill"></i><span>Hospital</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="{{route('hospitaltype.index')}}"><i class="text-white menu-icon bi bi-building-add"></i><span>Hoapital Type</span></a>
                    </li>
                        <li>
                            <a class="text-white waves-effect" href="{{route('city.index')}}"><i class="text-white menu-icon bi bi-buildings"></i><span>City</span></a>
                        </li>
                        <li>
                            <a class="text-white waves-effect" href="{{route('hospital.index')}}"><i class="text-white menu-icon bi bi-hospital-fill"></i><span>Hospital</span></a>
                        </li>
                        <li>
                            <a class="text-white waves-effect" href="{{route('hospitaltype.index')}}"><i class="text-white menu-icon bi bi-building-add"></i><span>Hoapital Type</span></a>
                        </li>
                        
                        <li>
                            <a class="text-white waves-effect" href="{{route('specialist.index')}}"><i class="text-white menu-icon bi bi-file-person-fill"></i><span>Specialist</span></a>
                        </li>
                    @endrole
                    
                    @role("Hospital")
                    <li>
                        <a class="text-white waves-effect" href="{{route('doctor.index')}}"><i class="text-white menu-icon bi bi-person-circle "></i><span>Doctor</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="{{route('gallery.index')}}"><i class="text-white menu-icon bi bi-hospital-fill"></i><span>Gallery</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="{{route('facility.index')}}"><i class="text-white menu-icon bi bi-images"></i><span>Facility</span></a>
                    </li>
                    <li>
                        <a class="text-white waves-effect" href="{{route('gallery.create')}}"><i class="text-white menu-icon "></i><span>Gallery</span></a>
                        <a class="text-white waves-effect" href="{{route('schedule.index')}}"><i class="text-white menu-icon bi bi-calendar-day-fill"></i><span>Schedule</span></a>
                    </li>
                    @endrole
                    <li>
                        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>Settings</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content ">
                            <li><a class="text-white" href="{{ route('users.index') }}">Manage User</a></li>
                            <li><a class="text-white" href="{{ route('roles.index') }}">Manage Role</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>

                </ul>

            </div>

        </div>

    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar">
        <div class="pull-left">
            <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <h1 class="page-title">@yield('header')</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">
            <!-- <div class="ico-item">
                    <a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
                    <form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form> -->
            <!-- /.searchform -->
            <!-- </div> -->
            <!-- /.ico-item -->
            <a class="text-white ico-item fa fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
            </a>
            <div class="ico-item fa fa-arrows-alt js__full_screen text-white"></div>

        </div>
        <!-- /.pull-right -->
    </div>


    <div id="wrapper">
        <div class="main-content" style="height: 500px;">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/plugin/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>
    <!-- Full Screen Plugin -->
    <script src="{{ asset('assets/plugin/fullscreen/jquery.fullscreen-min.js') }}"></script>

    <!-- Percent Circle -->
    <script src="{{ asset('assets/plugin/percircle/js/percircle.js') }}"></script>


    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="{{ asset('assets/plugin/chart/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/chart.chartist.init.min.js') }}"></script>

    <!-- FullCalendar -->
    <script src="{{ asset('assets/plugin/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fullcalendar.init.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/plugin/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/datatables.demo.min.js') }}"></script>

    <!-- <script src="{{ asset('assets/scripts/main.min.js') }}"></script> -->
    <script src="{{ asset('assets/color-switcher/color-switcher.min.js') }}"></script>
    <!-- -------------------- -->

    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>



    <!-- Dropify -->
    <script src="{{ asset('assets/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fileUpload.demo.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>


</body>

</html>