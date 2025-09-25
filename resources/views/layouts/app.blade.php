<!doctype html>
<html @php(language_attributes())>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php(do_action('get_header'))
	@php(wp_head())

	{{-- Fonts --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://use.typekit.net/lsg3eay.css">

	@vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body @php(body_class())>
	@php(wp_body_open())

	<div id="app">
		<a class="sr-only focus:not-sr-only" href="#main">
			{{ __('Skip to content', 'sage') }}
		</a>

		@include('sections.header')

		<main id="main" class="main">
			@yield('content')
		</main>

		<!--   @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif -->

		@include('sections.footer')
	</div>

	@php(do_action('get_footer'))
	@php(wp_footer())
</body>

</html>