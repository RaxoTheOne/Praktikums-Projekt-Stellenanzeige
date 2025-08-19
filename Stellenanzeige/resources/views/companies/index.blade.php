@extends('layouts.app')

@section('title','Firmen')

@section('content')
    <div class="panel">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
            <h1 style="margin:0;">Firmen</h1>
            <a class="button" href="{{ route('companies.create') }}">Neue Firma</a>
        </div>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <table class="table" style="margin-top:12px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
            @forelse($companies as $company)
                <tr>
                    <td><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->phone }}</td>
                    <td class="actions">
                        <a class="button secondary" href="{{ route('companies.edit', $company) }}">Bearbeiten</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                            @csrf
                            @method('DELETE')
                            <button class="button danger" type="submit">Löschen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Keine Einträge</td></tr>
            @endforelse
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            {{ $companies->links() }}
        </div>
    </div>
@endsection


