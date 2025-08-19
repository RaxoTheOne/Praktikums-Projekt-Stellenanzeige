@extends('layouts.app')
@section('title','Kategorie erstellen')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Neue Kategorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="row">
        <label>Name
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug') }}">
        </label>
        </div>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('categories.index') }}">Abbrechen</a>
        </div>
    </form>
</div>
@endsection


