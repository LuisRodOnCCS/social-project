<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />

		<title>@yield('title')</title>

		<!-- Bootstrap CSS -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
		/>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('scripts')


	</head>
	<body onload="init();">
		<main class="main-wrapper">
			@yield('header')
			@yield('content')
		</main>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
			crossorigin="anonymous"
		></script>
		<script src="{{ asset('js/app.js') }}"></script>}
		@yield('footerScripts')
	</body>
</html>