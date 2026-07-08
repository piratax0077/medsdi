<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDI | Chofer Ambulancia</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI | Chofer" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('page-styles')
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('template.chofer.menu')
    @include('template.asistente.header')

    @yield('content')

    <footer></footer>

    @include('template.include.nocomplatible')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var CSRF_TOKEN = '{{ csrf_token() }}';
    </script>

    @yield('page-scripts')
</body>
</html>
