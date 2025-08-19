@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="panel">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
            <h1 style="margin:0;">Stellenanzeigen</h1>
            <a class="button" href="{{ route('jobs.create') }}">Neue Anzeige</a>
        </div>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <table class="table" style="margin-top:12px;">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Firma</th>
                <th>Ort</th>
                <th>Typ</th>
                <th>Kategorien</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
        @forelse($jobs as $job)
            <tr>
                <td><a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a></td>
                <td>{{ optional($job->company)->name }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->type }}</td>
                <td>
                    @foreach($job->categories as $cat)
                        <span class="badge">{{ $cat->name }}</span>
                    @endforeach
                </td>
                <td class="actions">
                    <a class="button secondary" href="{{ route('jobs.edit', $job) }}">Bearbeiten</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                        @csrf
                        @method('DELETE')
                        <button class="button danger" type="submit">Löschen</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Keine Einträge</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top:1rem;">
        {{ $jobs->links() }}
    </div>
    </div>
@endsection


