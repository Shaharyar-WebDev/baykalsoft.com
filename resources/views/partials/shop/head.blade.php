  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title> {{ config('app.name') }} - @yield('title')</title>
  <link rel="icon" type="image/png" href="images/favicon.png">

  @vite('resources/css/app.css')

  @php
      $theme = config('app.theme', 'blue'); 
  @endphp

  @vite("resources/css/themes/{$theme}/index.css")

  @stack('styles')
