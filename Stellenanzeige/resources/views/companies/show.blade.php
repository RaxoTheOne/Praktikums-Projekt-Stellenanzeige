@extends('layouts.app')
@section('title', $company->name)
@section('content')
<div class="panel">
    @if(session('status'))<p>{{ session('status') }}</p>@endif
    <a class="button secondary" href="{{ route('companies.index') }}">← Zur Liste</a>

    <div style="display: flex; gap: 2rem; align-items: flex-start; margin: 1rem 0;">
        @if($company->logo)
            <div style="flex-shrink: 0;">
                <img src="{{ $company->logo_url }}" alt="Logo von {{ $company->name }}" style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            </div>
        @endif
        <div style="flex-grow: 1;">
            <h1 style="margin:12px 0 0 0;">{{ $company->name }}</h1>
            <p><strong>Website:</strong> {{ $company->website }}</p>
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Telefon:</strong> {{ $company->phone }}</p>
        </div>
    </div>

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


