<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Stellenanzeigen')</title>
	@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	@else
		<link rel="stylesheet" href="{{ asset('app.css') }}">
	@endif
</head>
<body>
	<header>
		<div class="inner container">
			<div class="brand">Jobboard</div>
			<nav>
				<a href="{{ route('jobs.index') }}">Jobs</a>
				<a href="{{ route('companies.index') }}">Firmen</a>
				<a href="{{ route('categories.index') }}">Kategorien</a>
				<a href="{{ route('jobs.create') }}">Neu</a>
			</nav>
		</div>
	</header>
	<main class="container" style="margin-top:16px;">
		@yield('content')
	</main>
</body>
</html>


