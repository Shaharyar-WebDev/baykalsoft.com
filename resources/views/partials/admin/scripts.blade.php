@stack('scripts-hp')

<!-- Include the JS (from CDN) -->
<script src="https://unpkg.com/@bprogress/core/dist/index.global.js"></script>
<script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/dist/simplebar.min.js') }}"></script>

<script src="{{ asset('js/admin/theme/theme.js') }}"></script>
<script src="{{ asset('js/admin/theme/app.min.js') }}"></script>
<script src="{{ asset('js/admin/theme/sidebarmenu-default.js') }}"></script>

<!-- Solar icons (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

<script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('libs/fullcalendar/index.global.min.js') }}"></script>

@stack('scripts')
<script>
    const {
        BProgress
    } = BProgressJS;

    BProgress.configure({
        color: '#0d6efd',
        height: '4px',
        position: 'top',
        transition: '0.4s ease',
    });

    // Start and done demo
    BProgress.start();


    document.addEventListener('DOMContentLoaded', () => {

        let sidebarOpen = localStorage.getItem("sidebarOpen") === "true";

        const logoEl = document.querySelector(".logo-img");
        const logoTxt = document.querySelector(".logo-text");
        const sidebarTogglerBtn = document.querySelector('.sidebartoggler');
        const sidebarNav = document.querySelector('.left-sidebar');

        const fixLogo = () => {

            if (document.body.getAttribute('data-sidebartype') == 'mini-sidebar') {
                logoEl.style.overflow = 'visible';
                logoTxt.style.display = 'none';
            } else {
                logoEl.style.overflow = 'hidden';
                logoTxt.style.display = 'inline-block';
            }
        }

        fixLogo();

        sidebarNav.addEventListener('mouseover', () => {
            if (document.body.getAttribute('data-sidebartype') == 'mini-sidebar') {
                logoTxt.style.display = 'inline-block';
            }
        });

        sidebarNav.addEventListener('mouseleave', () => {
            if (document.body.getAttribute('data-sidebartype') == 'mini-sidebar') {
                logoTxt.style.display = 'none';
            }
        });

        const toggleSidebar = () => {

            localStorage.setItem('sidebarOpen', !sidebarOpen);
            sidebarOpen = !sidebarOpen;
            fixLogo();

        }

        sidebarTogglerBtn?.addEventListener('click', () => {

            toggleSidebar();

        });

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

        BProgress.done();
    });
</script>
@vite(['resources/js/admin/app.js'])
