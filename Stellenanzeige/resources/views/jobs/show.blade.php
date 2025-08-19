@extends('layouts.app')
@section('title', $job->title)
@section('content')
<div class="panel">
    @if(session('status'))<p>{{ session('status') }}</p>@endif
    <a class="button secondary" href="{{ route('jobs.index') }}">← Zur Liste</a>
    <h1 style="margin:12px 0 0 0;">{{ $job->title }}</h1>
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
        <a class="button" href="{{ route('jobs.edit', $job) }}">Bearbeiten</a>
        <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline" onsubmit="return confirm('Wirklich löschen?')">
            @csrf
            @method('DELETE')
            <button class="button danger" type="submit">Löschen</button>
        </form>
    </div>
</div>
@endsection


