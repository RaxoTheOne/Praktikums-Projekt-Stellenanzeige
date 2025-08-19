<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anzeige erstellen</title>
    <style>body{font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;padding:1rem}label{display:block;margin-top:.5rem}</style>
</head>
<body>
    <h1>Neue Stellenanzeige</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <label>Titel
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        <label>Firma
            <select name="company_id">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id')==$company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Ort
            <input type="text" name="location" value="{{ old('location') }}">
        </label>
        <label>Beschreibung
            <textarea name="description" rows="6">{{ old('description') }}</textarea>
        </label>
        <label>Typ
            <select name="type">
                @foreach(['full-time','part-time','contract','internship'] as $t)
                    <option value="{{ $t }}" @selected(old('type')==$t)>{{ $t }}</option>
                @endforeach
            </select>
        </label>
        <label>Gehalt
            <input type="number" name="salary" value="{{ old('salary') }}">
        </label>
        <label>Veröffentlicht am
            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}">
        </label>
        <label>Kategorien
            <select multiple name="category_ids[]" size="6">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(collect(old('category_ids',[]))->contains($cat->id))>{{ $cat->name }}</option>
                @endforeach
            </select>
        </label>
        <div style="margin-top:1rem">
            <button type="submit">Speichern</button>
            <a href="{{ route('jobs.index') }}">Abbrechen</a>
        </div>
    </form>
</body>
</html>


