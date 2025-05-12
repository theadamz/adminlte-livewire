<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config("setting.general.web_name") }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
        @once
            <!--font-->
        <link href="{{ asset('assets/vendor/font/inter.css') }}" rel="stylesheet" type="text/css" />
        <!-- vendor -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/adminlte.min.css') }}">
        @endonce
    </head>
    <body>
        {{ $slot }}

        @once
            <!--bootstrap-->
        <script src="{{ asset('assets/vendor/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        @endonce
    </body>
</html>
