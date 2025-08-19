@extends('layouts.app')
@section('title','Anzeige bearbeiten')
@section('content')
<div class="panel">
    <h1 style="margin-top:0">Anzeige bearbeiten</h1>
    <form action="{{ route('jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <label>Titel
            <input type="text" name="title" value="{{ old('title', $job->title) }}">
        </label>
        <label>Firma (vorhanden)
            <select name="company_id">
                <option value="" @selected(!old('company_id', $job->company_id))>– Bitte wählen –</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id', $job->company_id)==$company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Neue Firma (optional)
            <input type="text" name="company_name" placeholder="Neue Firma anlegen" value="{{ old('company_name') }}">
        </label>
        </div>
        <div class="row">
        <label>Ort
            <input type="text" name="location" value="{{ old('location', $job->location) }}">
        </label>
        <label>Typ
            <select name="type">
                @foreach(['full-time','part-time','contract','internship'] as $t)
                    <option value="{{ $t }}" @selected(old('type', $job->type)==$t)>{{ $t }}</option>
                @endforeach
            </select>
        </label>
        </div>
        <label>Beschreibung
            <textarea name="description" rows="6">{{ old('description', $job->description) }}</textarea>
        </label>
        <div class="row">
        <label>Gehalt
            <input type="number" name="salary" value="{{ old('salary', $job->salary) }}">
        </label>
        <label>Veröffentlicht am
            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($job->published_at)->format('Y-m-d\TH:i')) }}">
        </label>
        </div>
        <label>Kategorien
            <select multiple name="category_ids[]" size="6">
                @php($selected = collect(old('category_ids', $job->categories->pluck('id')->all())))
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($selected->contains($cat->id))>{{ $cat->name }}</option>
                @endforeach
            </select>
        </label>
        <div style="margin-top:1rem">
            <button class="button" type="submit">Speichern</button>
            <a class="button secondary" href="{{ route('jobs.show', $job) }}">Abbrechen</a>
        </div>
    </form>
    </div>
@endsection


