<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light"
   dir="{{ in_array(app()->getLocale(), config('locale.rtl_locales') ) ? 'rtl' : 'ltr' }}">

<head>
    @include('partials.admin.head')
</head>

<body class="link-sidebar">

    <x-admin.dashboard.preloader />

    <div id="main-wrapper">

        @yield('content')

    </div>


    <script src="{{ asset('js/admin/vendor.min.js') }}" defer></script>

    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>

    <script src="{{ asset('js/admin/theme/app.init.js') }}" defer></script>
    <script src="{{ asset('js/admin/theme/theme.js') }}" defer></script>

    <script src="{{ asset('js/admin/plugins/toastr-init.js') }}" defer></script>

    <!-- Solar icons (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', () => {
                    const submitBtn = form.querySelector('[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML =
                            '<span class="spinner-border spinner-border-sm me-2"></span> {{ __('actions.wait') }}';
                    }
                });
            });
        });
    </script>

    @stack('scripts')

</body>

</html>
