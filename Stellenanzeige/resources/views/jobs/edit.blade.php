<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anzeige bearbeiten</title>
    <style>body{font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;padding:1rem}label{display:block;margin-top:.5rem}</style>
</head>
<body>
    <h1>Anzeige bearbeiten</h1>
    <form action="{{ route('jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Titel
            <input type="text" name="title" value="{{ old('title', $job->title) }}">
        </label>
        <label>Firma
            <select name="company_id">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id', $job->company_id)==$company->id)>{{ $company->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Ort
            <input type="text" name="location" value="{{ old('location', $job->location) }}">
        </label>
        <label>Beschreibung
            <textarea name="description" rows="6">{{ old('description', $job->description) }}</textarea>
        </label>
        <label>Typ
            <select name="type">
                @foreach(['full-time','part-time','contract','internship'] as $t)
                    <option value="{{ $t }}" @selected(old('type', $job->type)==$t)>{{ $t }}</option>
                @endforeach
            </select>
        </label>
        <label>Gehalt
            <input type="number" name="salary" value="{{ old('salary', $job->salary) }}">
        </label>
        <label>Veröffentlicht am
            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($job->published_at)->format('Y-m-d\TH:i')) }}">
        </label>
        <label>Kategorien
            <select multiple name="category_ids[]" size="6">
                @php($selected = collect(old('category_ids', $job->categories->pluck('id')->all())))
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($selected->contains($cat->id))>{{ $cat->name }}</option>
                @endforeach
            </select>
        </label>
        <div style="margin-top:1rem">
            <button type="submit">Speichern</button>
            <a href="{{ route('jobs.show', $job) }}">Abbrechen</a>
        </div>
    </form>
</body>
</html>


