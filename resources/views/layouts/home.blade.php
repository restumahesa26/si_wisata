<!DOCTYPE html>
<html lang="en">
<head>

<title>
    @yield('title')
</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">

@include('includes.home.style')

@stack('addon-style')

<link rel="shortcut icon" href="{{ url('frontend/images/logo.png') }}" />

</head>

<body>

<div class="super_container">

	<!-- Header -->

	@include('includes.home.navbar')

	@yield('content')

	<!-- Footer -->

    @include('includes.home.footer')

</div>

@include('includes.home.script')

@stack('addon-script')

</body>

</html>
