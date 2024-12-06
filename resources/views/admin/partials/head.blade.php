<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('module') - @yield('action')</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">

@stack('css')

<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">  
<link rel="stylesheet" href="{{ asset('administrator/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{ asset('administrator/dist/css/style.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/dist/css/slylecategory.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/dist/css/stylefom.css ') }}">

