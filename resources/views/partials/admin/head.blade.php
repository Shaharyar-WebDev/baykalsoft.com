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

    .placeholder {
        display: block;
        width: 100%;
        height: 1rem;
        margin: 0px !important;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        /* background-size: 200% 100%; */
        animation: shimmer 1.4s infinite;
        border-radius: 4px;
    }

    @keyframes shimmer {
        0% {
            background-position: 200% 0;
        }

        100% {
            background-position: -200% 0;
        }
    }

    .btn:focus {
        border: 1px solid !important;
    }

    th:focus {
        border: 1px solid var(--bs-primary) !important;
    }

    th:focus-visible {
        border: 1px solid var(--bs-primary) !important;
    }

    [x-cloak] {
        display: none !important;
    }

    tr:hover {
        background-color: #343a40 !important;
        transition: background-color 0.2s ease !important;
    }

    th:hover {
        background-color: #f5f5f5;
        transition: background-color 0.2s ease !important;
    }

    [data-bs-theme="dark"] tr:hover>td {
        background-color: #232f45 !important;
    }

    [data-bs-theme="dark"] th:hover {
        background-color: #232f45 !important;
    }
</style>

@stack('styles')

<link rel="preload" href="https://unpkg.com/@bprogress/core/dist/index.css" as="style"
    onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="https://unpkg.com/@bprogress/core/dist/index.css">
</noscript>

<style>
    .bprogress .bar {
        background: var(--bs-primary);
        position: fixed;
        z-index: var(--bprogress-z-index);
        top: 0;
        left: 0;
        width: 100%;
        height: var(--bprogress-height);
    }

    .bprogress .spinner-icon {
        width: var(--bprogress-spinner-size);
        height: var(--bprogress-spinner-size);
        box-sizing: border-box;
        border: solid var(--bprogress-spinner-border-size) transparent;
        border-top-color: var(--bs-primary);
        border-left-color: var(--bs-primary);
        border-radius: 50%;
        -webkit-animation: bprogress-spinner var(--bprogress-spinner-animation-duration) linear infinite;
        animation: bprogress-spinner var(--bprogress-spinner-animation-duration) linear infinite;
    }
</style>

<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/backgrounds/welcome-bg.png') }}"
    type="image/png">
<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/logos/favicon.png') }}"
    type="image/png">
<link rel="preload" fetchpriority="high" as="image" href="{{ asset('images/admin/logos/logo.svg') }}"
    type="image/svg+xml">


<script src="{{ asset('js/admin/theme/app.init.js') }}"></script>
