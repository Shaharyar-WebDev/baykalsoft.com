 <!-- Sidebar Start -->
 <aside class="left-sidebar with-vertical">

     <div>

         {{-- sidebar Logo --}}
         <div class="brand-logo d-flex align-items-center">
             <a href="index.html" class="text-nowrap logo-img">
                 <img src="{{ asset('images/admin/logos/logo.svg') }}" alt="Logo" loading="lazy">
             </a>

         </div>


         {{-- Sidebar Nav --}}
         <nav class="sidebar-nav scroll-sidebar" data-simplebar>
             <ul class="sidebar-menu" id="sidebarnav">

                 @foreach (config('sidebar') as $link)
                     <li class="sidebar-item">
                         <a class="sidebar-link {{ isset($link['children']) ? '' : (request()->routeIs($link['route']) ? 'active' : '') }}
 {{ isset($link['children']) ? 'has-arrow' : '' }}"
                             role="button" tabindex="0" id="get-url"
                             href="{{ isset($link['children']) ? '#' : (isset($link['url']) ? $link['url'] : route($link['route'])) }}"
                             aria-expanded="false"
                             @isset($link['children'])
                             onclick="return false;"
                             @endisset>
                             <iconify-icon icon="{{ $link['icon'] }}" class=""></iconify-icon>
                             <span class="hide-menu">{{ $link['label'] }}</span>
                         </a>
                         @isset($link['children'])
                             <ul aria-expanded="false" class="collapse first-level">
                                 @foreach ($link['children'] as $child_link)
                                     <li class="sidebar-item">
                                         <a class="sidebar-link {{ request()->routeIs($child_link['route']) ? 'active' : '' }}"
                                             href="{{ isset($child_link['url']) ? $child_link['url'] : route($child_link['route']) }}">
                                             <span class="icon-small"></span>
                                             <span class="hide-menu">{{ $child_link['label'] }}</span>
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
