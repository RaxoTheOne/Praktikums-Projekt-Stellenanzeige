@extends('layouts.app')
@section('title','Firma bearbeiten')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Firma bearbeiten</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <label>Name
            <input type="text" name="name" value="{{ old('name', $company->name) }}">
        </label>
        <label>Website
            <input type="url" name="website" value="{{ old('website', $company->website) }}">
        </label>
        </div>
        <div class="row">
        <label>Email
            <input type="email" name="email" value="{{ old('email', $company->email) }}">
        </label>
        <label>Telefon
            <input type="text" name="phone" value="{{ old('phone', $company->phone) }}">
        </label>
        </div>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('companies.show', $company) }}">Abbrechen</a>
        </div>
    </form>
</div>
@endsection


