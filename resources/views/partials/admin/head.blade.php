<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="format-detection" content="telephone=no">
<title> {{ config('app.name') }} - @yield('title')</title>
<link rel="icon" type="image/png" href="images/favicon.png">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@stack('styles')

<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/backgrounds/welcome-bg.png') }}"
    type="image/png">
<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/logos/favicon.png') }}" type="image/png">
<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/logos/logo.svg') }}" type="image/svg+xml">


<script src="{{ asset('js/admin/theme/app.init.js') }}"></script>
