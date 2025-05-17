<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ empty($title) ? config('setting.general.web_name') : $title . ' - ' . config('setting.general.web_name') }}</title>
    @assets
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/font/inter.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/fontawesome-free/css/all.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/adminlte.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/select2/css/select2.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/plugins/sweetalert2/sweetalert2.min.css') }}" type="text/css" />
        @vite('resources/css/app.css')
        @foreach (app()->general->getadditionalVendorCSS() as $fileLocation)
            <link href="{{ $fileLocation }}" rel="stylesheet" type="text/css" />
        @endforeach
        @foreach (app()->general->getadditionalCSS() as $fileLocation)
            @vite($fileLocation)
        @endforeach
        @stack('css')
    @endassets
</head>

<body>
    {{ $slot }}

    @assets
        <script src="{{ asset('assets/vendor/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        @vite('resources/js/app.js')
        @foreach (app()->general->getAdditionalVendorJS() as $fileLocation)
            <script src="{{ $fileLocation }}"></script>
        @endforeach
        @foreach (app()->general->getAdditionalJS() as $fileLocation)
            @vite($fileLocation)
        @endforeach
        @stack('js')
    @endassets
</body>

</html>
