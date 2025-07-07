<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('partials.shop.head')
</head>

<body>
    <!-- site -->
    <div class="site">
        <x-shop.navbar />
        <!-- site__body -->
        <div class="site__body">
            @yield('content')
        </div>
        <!-- site__body / end -->
        <x-shop.footer />
    </div>
    <!-- site / end -->
    <x-shop.mobile-menu />

    <x-shop.quick-view-modal />

    <x-shop.add-vehicle-modal />

    <x-shop.vehicle-picker-modal />

    <x-shop.photo-swipe />

    @include('partials.shop.scripts')
</body>

</html>
