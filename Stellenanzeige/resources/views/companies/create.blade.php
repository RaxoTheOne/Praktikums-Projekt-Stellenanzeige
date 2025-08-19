@extends('layouts.app')
@section('title','Firma erstellen')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Neue Firma</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="row">
        <label>Name
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <label>Website
            <input type="url" name="website" value="{{ old('website') }}">
        </label>
        </div>
        <div class="row">
        <label>Email
            <input type="email" name="email" value="{{ old('email') }}">
        </label>
        <label>Telefon
            <input type="text" name="phone" value="{{ old('phone') }}">
        </label>
        </div>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('companies.index') }}">Abbrechen</a>
        </div>
    </form>
</div>
@endsection


