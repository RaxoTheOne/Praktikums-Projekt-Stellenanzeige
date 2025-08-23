@extends('layouts.app')
@section('title','Firma erstellen')
@section('content')
<div class="panel">
    <h1 style="margin-top:0; color: #10b981;">Neue Firma erstellen</h1>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Grundinformationen</h3>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Name *</span>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="form-input" placeholder="Firmenname eingeben">
                </label>
                <label class="form-label">
                    <span class="label-text">Website</span>
                    <input type="url" name="website" value="{{ old('website') }}"
                           class="form-input" placeholder="https://www.beispiel.de">
                </label>
            </div>
        </div>

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Kontaktdaten</h3>
            <div class="row">
                <label class="form-label">
                    <span class="label-text">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-input" placeholder="info@beispiel.de">
                </label>
                <label class="form-label">
                    <span class="label-text">Telefon</span>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                           class="form-input" placeholder="+49 123 456789">
                </label>
            </div>
        </div>

        <div class="form-section">
            <h3 style="margin-bottom: 1rem; color: #10b981;">Firmenlogo</h3>
            <div class="logo-upload-area">
                <label class="form-label logo-label">
                    <span class="label-text">Logo hochladen (optional)</span>
                    <div class="file-upload-container">
                        <input type="file" name="logo" accept="image/jpeg,image/png,image/jpg,image/gif"
                               class="file-input" id="logo-upload">
                        <div class="file-upload-display">
                            <div class="upload-icon">📁</div>
                            <div class="upload-text">
                                <strong>Datei auswählen</strong><br>
                                <span>oder hierher ziehen</span>
                            </div>
                        </div>
                    </div>
                    <div class="upload-info">
                        <small style="color: #9ca3af;">
                            📸 Unterstützte Formate: JPEG, PNG, JPG, GIF<br>
                            📏 Maximale Größe: 2MB<br>
                            🎯 Empfohlen: Quadratisches Bild (z.B. 300x300px)
                        </small>
                    </div>
                </label>
            </div>
        </div>

        <div class="form-actions">
            <button class="button primary" type="submit">
                <span style="margin-right: 0.5rem;">💾</span>Firma speichern
            </button>
            <a class="button secondary" href="{{ route('companies.index') }}">
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

.logo-upload-area {
    background: #374151;
    padding: 1rem;
    border-radius: 6px;
}

.file-upload-container {
    position: relative;
    margin-top: 0.5rem;
}

.file-input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-upload-display {
    border: 2px dashed #10b981;
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    transition: all 0.2s;
    background: #1f2937;
}

.file-upload-display:hover {
    border-color: #34d399;
    background: #111827;
}

.upload-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.upload-text {
    color: #9ca3af;
}

.upload-text strong {
    color: #e5e7eb;
}

.upload-info {
    margin-top: 1rem;
    padding: 1rem;
    background: #374151;
    border-radius: 6px;
    border-left: 4px solid #10b981;
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


