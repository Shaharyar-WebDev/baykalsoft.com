 <!-- Sidebar Start -->
 <aside class="left-sidebar with-vertical">
     <div>
         {{-- sidebar Logo --}}
         <div class="brand-logo d-flex align-items-center">
             <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img">
                 <img src="{{ asset('images/admin/logos/logo.svg') }}" class="logo-el" width="60px" alt="Logo"
                     loading="lazy">
                 <div class="logo-text"
                     style="
                  display: none;
                font-size: 1.25rem;
                font-weight: 600;
                margin-left: 12px;
                white-space: nowrap;
                transition: opacity 0.3s ease;
                ">
                     {{ config('app.name') }}
                 </div>
             </a>
         </div>
         {{-- Sidebar Nav --}}
         <nav class="sidebar-nav scroll-sidebar" data-simplebar>
             <ul class="sidebar-menu" id="sidebarnav">

                 @foreach (config('sidebar') as $link)
                     <li class="sidebar-item">
                         <a class="sidebar-link {{ isset($link['children']) ? '' : (request()->routeIs($link['route']) ? 'active' : '') }}
 {{ isset($link['children']) ? 'has-arrow' : '' }}"
                             role="button" tabindex="0" id="get-url" aria-expanded="false"
                             @isset($link['children'])
                             onclick="return false;"
                             @else
                             href="{{ isset($link['url']) ? $link['url'] : route($link['route']) }}"
                             @endisset>
                             <iconify-icon icon="{{ $link['icon'] }}" class=""></iconify-icon>
                             <span class="hide-menu">{{ __($link['label']) }}</span>
                         </a>
                         @isset($link['children'])
                             <ul aria-expanded="false" class="collapse first-level">
                                 @foreach ($link['children'] as $child_link)
                                     <li class="sidebar-item">
                                         <a class="sidebar-link {{ request()->routeIs($child_link['route']) ? 'active' : '' }}"
                                             href="{{ isset($child_link['url']) ? $child_link['url'] : route($child_link['route']) }}">
                                             <span class="icon-small"></span>
                                             <span class="hide-menu">{{ __($child_link['label']) }}</span>
                                         </a>
                                     </li>
                                 @endforeach
                             </ul>
                         @endisset

                     </li>
                 @endforeach


             </ul>
         </nav>
         {{-- End sidebar nav --}}
     </div>
 </aside>
 <!--  Sidebar End -->
