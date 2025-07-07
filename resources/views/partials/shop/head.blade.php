  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title> {{ config('app.name') }} - @yield('title')</title>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/photoswipe/photoswipe.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/photoswipe/default-skin/default-skin.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/'.config('app.theme').'/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/'.config('app.theme').'/style.header-spaceship-variant-one.css') }}" media="(min-width: 1200px)">
  <link rel="stylesheet" href="{{ asset('css/'.config('app.theme').'/style.mobile-header-variant-one.css') }}" media="(max-width: 1199px)">
  @stack('styles')

  <!-- font - fontawesome -->
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
