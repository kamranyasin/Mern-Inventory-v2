<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') Siggmaa </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="images/sigmaa-icon.png" />

  <!-- Include Styles -->
  @include('layouts/sections/styles')

  @yield('styles')

  <style>

    ::-webkit-scrollbar{
      width: 10px;
    }
    ::-webkit-scrollbar-thumb{
        background: #626ed4;
        border-radius: 6px;
    }
    ::-webkit-scrollbar-thumb:hover{
        background: #4151da;
        border-radius: 6px;
    }

  </style>

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')
</head>

<body>


  @guest

    @yield('authentication')

  @else

    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->

  @endguest

  <!-- Include Scripts -->
  @include('layouts/sections/scripts')

</body>

</html>
