<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('assets-frontend/img/favicon.png') }}">
    @yield('title-head')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <link href="{{ asset('assets-frontend/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link id="pagestyle" href="{{ asset('assets-frontend/css/material-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/js/app.js'])

</head>


<body class="g-sidenav-show  bg-gray-100">

    <div id="preloader">
        <img src="{{ asset('assets-frontend/img/preloader.png') }}" alt="Loading..." class="preloader-img">
    </div>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

    </main>

    <script src="{{ asset('assets-frontend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/plugins/chartjs.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/treemap.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="{{ asset('assets-frontend/js/core/helper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('javascript')

    @stack('javascript')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif
</body>

</html>
