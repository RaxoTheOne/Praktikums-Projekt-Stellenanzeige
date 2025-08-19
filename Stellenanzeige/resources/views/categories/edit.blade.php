@extends('layouts.app')
@section('title','Kategorie bearbeiten')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Kategorie bearbeiten</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <label>Name
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}">
        </label>
        </div>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('categories.show', $category) }}">Abbrechen</a>
        </div>
    </form>
</div>
@endsection


