<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}" defer></script>

<script src="{{ asset('js/admin/theme/app.init.js') }}" defer></script>
<script src="{{ asset('js/admin/theme/theme.js') }}" defer></script>
<script src="{{ asset('js/admin/theme/app.min.js') }}" defer></script>
<script src="{{ asset('js/admin/theme/sidebarmenu-default.js') }}" defer></script>

<!-- Solar icons (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js" defer></script>

<script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('js/admin/dashboards/dashboard1.js') }}" defer></script>
<script src="{{ asset('libs/fullcalendar/index.global.min.js') }}" defer></script>

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
