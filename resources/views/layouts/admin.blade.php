<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shri Dharam') }} - Admin</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <meta name="description" content="Online Information of Temples, Festivals, Vrats, Darshan, Chalisa, Aarti of Hanuman, Ganesh, Lakshmi, Durga, Shiva, Vishnu, Gods &amp; Goddesses" />
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])

    <script src="{{ asset('dashboard/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('dashboard/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->

    <link rel="stylesheet" href="{{ asset('dashboard/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/shriadmin.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    <link rel="stylesheet" href="{{ asset('dashboard/css/dropzon-basic.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/dashboard.css') }}" />


</head>
<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.admin-sidebar')
            <div class="main-panel">
                @include('layouts.admin-topbar')

                    @yield('content')

                <footer class="footer">
                  <div class="container-fluid d-flex justify-content-center">
                    <div class="copyright">
                      2024, Shri Dharam | All Rights Reserved
                    </div>
                  </div>
                </footer>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{ asset('dashboard/js/core/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>

        <script src="{{ asset('dashboard/js/plugin/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <!-- jQuery Scrollbar -->
        <script src="{{ asset('dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

        <!-- jQuery Sparkline -->
        <script src="{{ asset('dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Datatables -->
        <script src="{{ asset('dashboard/js/plugin/datatables/datatables.min.js') }}"></script>

        <!-- Bootstrap Notify -->
        <script src="{{ asset('dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

        <!-- Sweet Alert -->
        <script src="{{ asset('dashboard/js/plugin/sweetalert/sweetalert2-11.js') }}"></script>

        <script src="{{ asset('dashboard/js/plugin/summernote/summernote-lite.min.js') }}"></script>

        <script src="{{ asset('dashboard/js/dropzone.js') }}"></script>


        <!-- custom JS -->
        <script src="{{ asset('dashboard/js/shriadmin.js') }}"></script>
        <script src="{{ asset('dashboard/js/customdropzone.js') }}"></script>

        @yield('javascript')

    </div>
</body>
</html>
