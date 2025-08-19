@extends('layouts.app')
@section('title', $company->name)
@section('content')
<div class="panel">
    @if(session('status'))<p>{{ session('status') }}</p>@endif
    <a class="button secondary" href="{{ route('companies.index') }}">← Zur Liste</a>
    <h1 style="margin:12px 0 0 0;">{{ $company->name }}</h1>
    <p><strong>Website:</strong> {{ $company->website }}</p>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Telefon:</strong> {{ $company->phone }}</p>

    <h3>Stellenanzeigen</h3>
    <ul>
        @forelse($company->jobListings as $job)
            <li><a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a></li>
        @empty
            <li>Keine Anzeigen</li>
        @endforelse
    </ul>

    <div style="margin-top:1rem">
        <a class="button" href="{{ route('companies.edit', $company) }}">Bearbeiten</a>
        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline" onsubmit="return confirm('Wirklich löschen?')">
            @csrf
            @method('DELETE')
            <button class="button danger" type="submit">Löschen</button>
        </form>
    </div>
</div>
@endsection


