
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DMCS') }}</title>
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
    <meta name="description" content="Duty Management System" />
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> -->

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite(['resources/sass/app.css', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body>
    <main>
        @yield('content')
    </main>
    {{-- <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script> --}}

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart.js') }}"></script>
    <script src="{{ asset('dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('dashboard/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/task.js') }}"></script>
</body>
</html>
