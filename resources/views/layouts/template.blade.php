<!DOCTYPE html>

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Teach Me | @yield('title')</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Study here">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Teach me team">
  <meta name="generator" content="generator">
  
  <!-- theme meta -->
  <meta name="theme-name" content="classimax" />

  <!-- favicon -->
  <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon">

  <!-- 
  Essential stylesheets
  =====================================-->
  <link href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/bootstrap/bootstrap-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css') }}" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  @yield('style')

</head>

<body class="body-wrapper">

  @include('layouts.nav')
  @yield('content')
  @include('layouts.footer')

<!-- 
Essential Scripts
=====================================-->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap-slider.js') }}"></script>
<script src="{{ asset('plugins/tether/js/tether.min.js') }}"></script>
<script src="{{ asset('plugins/raty/jquery.raty-fa.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
<!-- google map -->
<script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU') }}" defer></script>
<script src="{{ asset('plugins/google-map/map.js') }}" defer></script>

<script src="{{ asset('js/script.js') }}"></script>

@yield('scripts')

</body>

</html>
