<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ in_array(app()->getLocale(), config('locale.rtl_locales')) ? 'rtl' : 'ltr' }}" data-bs-theme="dark">

<head>
    @include('partials.admin.head')
    @routes
</head>

<body class="link-sidebar">

    <!-- Toast -->
    <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Welcome to MatDash</h5>
                <h6 class="text-white fs-2 mb-0">Easy to costomize the Template!!!</h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <x-admin.dashboard.preloader />

    <div id="main-wrapper">

        <x-admin.dashboard.sidebar />

        <div class="page-wrapper">

            <x-admin.dashboard.header />

            <x-admin.dashboard.sidebar-horizontal />

            <x-admin.dashboard.wrapper>

                @yield('content')

            </x-admin.dashboard.wrapper>

            <x-admin.dashboard.customizer />

        </div>

        <x-admin.dashboard.search />

    </div>
    <div class="dark-transparent sidebartoggler"></div>

    @include('partials.admin.scripts')
</body>

</html>
