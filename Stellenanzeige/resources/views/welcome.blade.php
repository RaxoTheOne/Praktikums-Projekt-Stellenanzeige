<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>
        .links a{margin-right:12px}
    </style>
    </head>
<body>
<main class="container" style="margin-top:32px;">
    <h1>Hello World 👋</h1>
    <p>Willkommen zur Stellenanzeigen-App.</p>
    <div class="links">
        <a class="button" href="{{ route('jobs.index') }}">Zu den Jobs</a>
        <a class="button secondary" href="{{ route('companies.index') }}">Firmen</a>
        <a class="button secondary" href="{{ route('categories.index') }}">Kategorien</a>
    </div>
</main>
</body>
</html>
