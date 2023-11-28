<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/tabler-icons.css')) }}" />

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">

<!-- Core CSS -->
{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" /> --}}

<link rel="stylesheet" href="{{asset(mix('assets/vendor/css/rtl/core.css'))}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset(mix('assets/vendor/css/rtl/theme-default.css'))}}" class="template-customizer-theme-css" />


<link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />

<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
