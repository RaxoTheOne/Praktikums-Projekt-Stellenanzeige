<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
    <style>body{font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;padding:1rem}.badge{display:inline-block;padding:0 .5rem;border:1px solid #ccc;border-radius:.25rem;margin-right:.25rem}</style>
</head>
<body>
    @if(session('status'))<p>{{ session('status') }}</p>@endif
    <a href="{{ route('jobs.index') }}">← Zur Liste</a>
    <h1>{{ $job->title }}</h1>
    <p><strong>Firma:</strong> {{ optional($job->company)->name }}</p>
    <p><strong>Ort:</strong> {{ $job->location }}</p>
    <p><strong>Typ:</strong> {{ $job->type }}</p>
    <p><strong>Gehalt:</strong> {{ $job->salary }}</p>
    <p><strong>Veröffentlicht:</strong> {{ optional($job->published_at)->toDateTimeString() }}</p>
    <p><strong>Kategorien:</strong>
        @foreach($job->categories as $cat)
            <span class="badge">{{ $cat->name }}</span>
        @endforeach
    </p>
    <article>
        <pre style="white-space:pre-wrap">{{ $job->description }}</pre>
    </article>

    <div style="margin-top:1rem">
        <a href="{{ route('jobs.edit', $job) }}">Bearbeiten</a>
        <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline" onsubmit="return confirm('Wirklich löschen?')">
            @csrf
            @method('DELETE')
            <button type="submit">Löschen</button>
        </form>
    </div>
</body>
</html>


