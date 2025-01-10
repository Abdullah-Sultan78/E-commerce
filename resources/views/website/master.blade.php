<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>Love @yield('title')</title>
{{-- <meta name="description" content="" /> --}}
@include('website.includes.css')
</head>
<body>

@include('website.includes.header')
<div id="ajaxRes">
@yield('body')
</div>
@include('website.includes.footer')
@include('website.includes.js')
</body>
</html>
