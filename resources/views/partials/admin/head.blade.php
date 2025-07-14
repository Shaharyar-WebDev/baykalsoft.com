<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="format-detection" content="telephone=no">
<title> {{ config('app.name') }} - @yield('title')</title>
<link rel="icon" type="image/png" href="images/favicon.png">

<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

@stack('styles')
