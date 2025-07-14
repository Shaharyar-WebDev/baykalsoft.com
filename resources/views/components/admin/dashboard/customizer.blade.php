  <button class="btn btn-danger p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
      type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="icon ti ti-settings fs-7"></i>
  </button>

  <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel">
      <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
              Settings
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" data-simplebar style="height: calc(100vh - 80px)">
          <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout"
                  onclick="localStorage.setItem('theme', 'light')" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout">
                  <i class="icon ti ti-brightness-up fs-7 me-2"></i>Light
              </label>

              <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout"
                  onclick="localStorage.setItem('theme', 'dark')" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout">
                  <i class="icon ti ti-moon fs-7 me-2"></i>Dark
              </label>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="ltr-layout">
                  <i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR
              </label>

              <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="rtl-layout">
                  <i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL
              </label>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

          <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">

              @foreach (config('ui.theme') as $theme)
                  <input type="radio" class="btn-check" name="color-theme-layout" id="{{ $theme['name'] }}"
                      autocomplete="off" />
                  <label class="btn p-9 btn-outline-primary rounded-2 d-flex align-items-center justify-content-center"
                      onclick="handleColorTheme('{{ $theme['name'] }}')" for="{{ $theme['name'] }}"
                      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $theme['label'] }}">
                      <div
                          class="color-box rounded-circle d-flex align-items-center justify-content-center {{ $theme['skin'] }} }}">
                          <i class="ti ti-check text-white d-flex icon fs-5"></i>
                      </div>
                  </label>
              @endforeach
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <div>
                  <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
                  <label class="btn p-9 btn-outline-primary rounded-2" for="vertical-layout" onclick="localStorage.setItem('layout', 'vertical');">
                      <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical
                  </label>
              </div>
              <div>
                  <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
                  <label class="btn p-9 btn-outline-primary rounded-2" for="horizontal-layout" onclick="localStorage.setItem('layout', 'horizontal');">
                      <i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal
                  </label>
              </div>
          </div>

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="boxed-layout" onclick="localStorage.setItem('boxedLayout', true);">
                  <i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed
              </label>

              <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="full-layout" onclick="localStorage.setItem('boxedLayout', false);">
                  <i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full
              </label>
          </div>

          {{-- <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <a href="javascript:void(0)" class="fullsidebar">
                  <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar"
                      autocomplete="off" />
                  <label class="btn p-9 btn-outline-primary rounded-2" for="full-sidebar">
                      <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full
                  </label>
              </a>
              <div>
                  <input type="radio" class="btn-check" name="sidebar-type" id="mini-sidebar"
                      autocomplete="off" />
                  <label class="btn p-9 btn-outline-primary rounded-2" for="mini-sidebar">
                      <i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse
                  </label>
              </div>
          </div> --}}

          <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

          <div class="d-flex flex-row gap-3 customizer-box" role="group">
              <input type="radio" class="btn-check" name="card-layout" id="card-with-border"
                  autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="card-with-border">
                  <i class="icon ti ti-border-outer fs-7 me-2"></i>Border
              </label>

              <input type="radio" class="btn-check" name="card-layout" id="card-without-border"
                  autocomplete="off" />
              <label class="btn p-9 btn-outline-primary rounded-2" for="card-without-border">
                  <i class="icon ti ti-border-none fs-7 me-2"></i>Shadow
              </label>
          </div>
      </div>
  </div>

  <script>
      function handleColorTheme(e) {
          localStorage.setItem("colorTheme", e);
          document.documentElement.setAttribute("data-color-theme", e);
      }
  </script>
