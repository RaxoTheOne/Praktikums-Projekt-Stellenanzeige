@extends('layouts.app')
@section('title','Anzeige erstellen')
@section('content')
<div class="panel">
    <h1 style="margin-top:0; color: #10b981;">Neue Stellenanzeige</h1>

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Grundinformationen</h3>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Titel *</span>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="form-input" placeholder="Stellenbezeichnung eingeben">
                </label>
                <label class="form-label">
                    <span class="label-text">Firma (vorhanden) *</span>
                    <select name="company_id" class="form-input" required>
                        <option value="">– Bitte wählen –</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" @selected(old('company_id')==$company->id)>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Neue Firma (optional)</span>
                    <input type="text" name="company_name" placeholder="Neue Firma anlegen"
                           value="{{ old('company_name') }}" class="form-input">
                </label>
                <label class="form-label">
                    <span class="label-text">Ort *</span>
                    <input type="text" name="location" value="{{ old('location') }}" required
                           class="form-input" placeholder="Stadt eingeben">
                </label>
            </div>
        </div>

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Stellendetails</h3>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Typ *</span>
                    <select name="type" class="form-input" required>
                        <option value="">– Bitte wählen –</option>
                        <option value="Vollzeit" @selected(old('type')=='Vollzeit')>Vollzeit</option>
                        <option value="Teilzeit" @selected(old('type')=='Teilzeit')>Teilzeit</option>
                        <option value="Befristet" @selected(old('type')=='Befristet')>Befristet</option>
                        <option value="Praktikum" @selected(old('type')=='Praktikum')>Praktikum</option>
                        <option value="Ausbildung" @selected(old('type')=='Ausbildung')>Ausbildung</option>
                        <option value="Minijob" @selected(old('type')=='Minijob')>Minijob</option>
                        <option value="Remote" @selected(old('type')=='Remote')>Remote</option>
                        <option value="Hybrid" @selected(old('type')=='Hybrid')>Hybrid</option>
                    </select>
                </label>
                <label class="form-label">
                    <span class="label-text">Gehalt (optional)</span>
                    <input type="number" name="salary" value="{{ old('salary') }}"
                           class="form-input" placeholder="Jahresgehalt in €">
                </label>
            </div>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Veröffentlicht am (optional)</span>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                           class="form-input">
                </label>
            </div>
        </div>

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Beschreibung</h3>
            <label class="form-label">
                <span class="label-text">Beschreibung *</span>
                <textarea name="description" rows="6" required class="form-input"
                          placeholder="Detaillierte Beschreibung der Stelle...">{{ old('description') }}</textarea>
            </label>
        </div>

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Kategorien</h3>
            <label class="form-label">
                <span class="label-text">Kategorien (optional)</span>
                <select multiple name="category_ids[]" size="6" class="form-input">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(collect(old('category_ids',[]))->contains($cat->id))>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <small style="color: #9ca3af; margin-top: 0.5rem; display: block;">
                    📝 Mehrfachauswahl mit Strg+Klick (Windows) oder Cmd+Klick (Mac)
                </small>
            </label>
        </div>

        <div class="form-actions">
            <button class="button primary" type="submit">
                <span style="margin-right: 0.5rem;">💾</span>Stelle speichern
            </button>
            <a class="button secondary" href="{{ route('jobs.index') }}">
                <span style="margin-right: 0.5rem;">❌</span>Abbrechen
            </a>
        </div>
    </form>
</div>

<style>
.form-section {
    background: #1f2937;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    border: 1px solid #374151;
}

.form-label {
    display: flex;
    flex-direction: column;
    margin-bottom: 1rem;
}

.label-text {
    font-weight: 600;
    color: #10b981;
    margin-bottom: 0.5rem;
}

.form-input {
    padding: 0.75rem;
    border: 2px solid #4b5563;
    border-radius: 6px;
    font-size: 1rem;
    background: #374151;
    color: #e5e7eb;
    transition: border-color 0.2s;
}

.form-input:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.form-input::placeholder {
    color: #9ca3af;
}

select.form-input {
    cursor: pointer;
}

textarea.form-input {
    resize: vertical;
    min-height: 120px;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #374151;
}

.button.primary {
    background: #10b981;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    transition: background-color 0.2s;
}

.button.primary:hover {
    background: #059669;
}

.button.secondary {
    background: #6b7280;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    transition: background-color 0.2s;
}

.button.secondary:hover {
    background: #4b5563;
}
</style>
@endsection


