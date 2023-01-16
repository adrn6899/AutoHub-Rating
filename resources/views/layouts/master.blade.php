<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- css --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- javascript --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.bootstrap5.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header class="row">
        @include('navbar.sidenav')
    </header>

    <div class="body-container">
        @yield('content')
    </div>
    @yield('javascript')
    <footer class="row">
        
    </footer>
</body>
</html>