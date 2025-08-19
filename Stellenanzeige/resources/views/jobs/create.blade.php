@extends('layouts.app')
@section('title','Anzeige erstellen')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Neue Stellenanzeige</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="row">
        <label>Titel
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        <label>Firma (vorhanden)
            <select name="company_id">
                <option value="" @selected(!old('company_id'))>– Bitte wählen –</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id')==$company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Neue Firma (optional)
            <input type="text" name="company_name" placeholder="Neue Firma anlegen" value="{{ old('company_name') }}">
        </label>
        </div>
        <div class="row">
        <label>Ort
            <input type="text" name="location" value="{{ old('location') }}">
        </label>
        <label>Typ
            <select name="type">
                @foreach(['full-time','part-time','contract','internship'] as $t)
                    <option value="{{ $t }}" @selected(old('type')==$t)>{{ $t }}</option>
                @endforeach
            </select>
        </label>
        </div>
        <label>Beschreibung
            <textarea name="description" rows="6">{{ old('description') }}</textarea>
        </label>
        <div class="row">
        <label>Gehalt
            <input type="number" name="salary" value="{{ old('salary') }}">
        </label>
        <label>Veröffentlicht am
            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}">
        </label>
        </div>
        <label>Kategorien
            <select multiple name="category_ids[]" size="6">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(collect(old('category_ids',[]))->contains($cat->id))>{{ $cat->name }}</option>
                @endforeach
            </select>
        </label>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('jobs.index') }}">Abbrechen</a>
        </div>
    </form>
</div>
@endsection


