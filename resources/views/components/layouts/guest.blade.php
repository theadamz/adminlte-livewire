<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ empty($title) ? config('setting.general.web_name') : $title . ' - ' . config('setting.general.web_name') }}</title>
    @assets
        @vite('resources/css/app.css')
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/font/inter.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/fontawesome-free/css/all.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/adminlte.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/select2/css/select2.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" type="text/css" />
        @stack('styles')
    @endassets
    @vite([])
</head>

<body>
    {{ $slot }}

    @once
        <script type="text/javascript" src="{{ asset('assets/vendor/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor/js/adminlte.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor/plugins/select2/js/select2.full.min.js') }}"></script>
        @vite('resources/js/app.js')
        @stack('scripts')
    @endonce
</body>

</html>
