@extends('layouts.app')

@section('title','Kategorien')

@section('content')
    <div class="panel">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;">
            <h1 style="margin:0;">Kategorien</h1>
            <a class="button" href="{{ route('categories.create') }}">Neue Kategorie</a>
        </div>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <table class="table" style="margin-top:12px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->slug }}</td>
                    <td class="actions">
                        <a class="button secondary" href="{{ route('categories.edit', $category) }}">Bearbeiten</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                            @csrf
                            @method('DELETE')
                            <button class="button danger" type="submit">Löschen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Keine Einträge</td></tr>
            @endforelse
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            {{ $categories->links() }}
        </div>
    </div>
@endsection


