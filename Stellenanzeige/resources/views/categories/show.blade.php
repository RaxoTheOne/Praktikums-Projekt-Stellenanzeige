@extends('layouts.app')
@section('title', $category->name)
@section('content')
<div class="panel">
    @if(session('status'))<p>{{ session('status') }}</p>@endif
    <a class="button secondary" href="{{ route('categories.index') }}">← Zur Liste</a>
    <h1 style="margin:12px 0 0 0;">{{ $category->name }}</h1>
    <p><strong>Slug:</strong> {{ $category->slug }}</p>

    <h3>Stellenanzeigen</h3>
    <ul>
        @forelse($category->jobListings as $job)
            <li><a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a></li>
        @empty
            <li>Keine Anzeigen</li>
        @endforelse
    </ul>

    <div style="margin-top:1rem">
        <a class="button" href="{{ route('categories.edit', $category) }}">Bearbeiten</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline" onsubmit="return confirm('Wirklich löschen?')">
            @csrf
            @method('DELETE')
            <button class="button danger" type="submit">Löschen</button>
        </form>
    </div>
</div>
@endsection


