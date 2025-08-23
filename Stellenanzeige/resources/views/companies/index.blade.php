@extends('layouts.app')

@section('title','Firmen')

@section('content')
    <div class="panel">
        <div class="page-header">
            <h1 style="margin:0; color: #10b981;">🏢 Firmenverzeichnis</h1>
            <a class="button primary" href="{{ route('companies.create') }}">
                <span style="margin-right: 0.5rem;">➕</span>Neue Firma
            </a>
        </div>

        @if(session('status'))
            <div class="status-message">
                <span style="margin-right: 0.5rem;">✅</span>{{ session('status') }}
            </div>
        @endif

        <div class="companies-table-container">
            <table class="companies-table">
                <thead>
                    <tr>
                        <th class="logo-column">Logo</th>
                        <th class="name-column">Firmenname</th>
                        <th class="website-column">Website</th>
                        <th class="contact-column">Kontakt</th>
                        <th class="actions-column">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($companies as $company)
                    <tr class="company-row">
                        <td class="logo-cell">
                            @if($company->logo)
                                <div class="company-logo">
                                    <img src="{{ $company->logo_url }}" alt="Logo von {{ $company->name }}"
                                         class="logo-image">
                                </div>
                            @else
                                <div class="no-logo-placeholder">
                                    <span class="placeholder-icon">🏢</span>
                                </div>
                            @endif
                        </td>
                        <td class="name-cell">
                            <a href="{{ route('companies.show', $company) }}" class="company-name-link">
                                {{ $company->name }}
                            </a>
                        </td>
                        <td class="website-cell">
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank" class="website-link">
                                    <span style="margin-right: 0.5rem;">🌐</span>{{ $company->website }}
                                </a>
                            @else
                                <span class="no-website">Keine Website</span>
                            @endif
                        </td>
                        <td class="contact-cell">
                            <div class="contact-info">
                                @if($company->email)
                                    <div class="contact-item">
                                        <span class="contact-icon">📧</span>
                                        <span class="contact-text">{{ $company->email }}</span>
                                    </div>
                                @endif
                                @if($company->phone)
                                    <div class="contact-item">
                                        <span class="contact-icon">📞</span>
                                        <span class="contact-text">{{ $company->phone }}</span>
                                    </div>
                                @endif
                                @if(!$company->email && !$company->phone)
                                    <span class="no-contact">Keine Kontaktdaten</span>
                                @endif
                            </div>
                        </td>
                        <td class="actions-cell">
                            <div class="action-buttons">
                                <a class="button secondary small" href="{{ route('companies.edit', $company) }}">
                                    <span style="margin-right: 0.5rem;">✏️</span>Bearbeiten
                                </a>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                      onsubmit="return confirm('Wirklich löschen?')" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger small" type="submit">
                                        <span style="margin-right: 0.5rem;">🗑️</span>Löschen
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="no-companies">
                            <div class="empty-state">
                                <span class="empty-icon">🏢</span>
                                <h3>Keine Firmen vorhanden</h3>
                                <p>Erstellen Sie die erste Firma, um zu beginnen.</p>
                                <a href="{{ route('companies.create') }}" class="button primary">Erste Firma erstellen</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        @if($companies->hasPages())
            <div class="pagination-container">
                {{ $companies->links() }}
            </div>
        @endif
    </div>

<style>
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #10b981;
}

.status-message {
    background: #d1fae5;
    color: #065f46;
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1.5rem;
    border-left: 4px solid #10b981;
    font-weight: 500;
}

.companies-table-container {
    background: #1f2937;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.3);
}

.companies-table {
    width: 100%;
    border-collapse: collapse;
}

.companies-table th {
    background: #374151;
    padding: 1.2rem 1rem;
    text-align: left;
    font-weight: 600;
    color: #10b981;
    border-bottom: 2px solid #10b981;
}

.companies-table td {
    padding: 1.2rem 1rem;
    border-bottom: 1px solid #4b5563;
    vertical-align: top;
    color: #e5e7eb;
}

.company-row:hover {
    background: #374151;
}

.logo-column { width: 120px; }
.name-column { width: 25%; }
.website-column { width: 20%; }
.contact-column { width: 30%; }
.actions-column { width: 200px; }

.logo-cell {
    text-align: center;
}

.company-logo {
    display: flex;
    justify-content: center;
}

.logo-image {
    max-width: 60px;
    max-height: 60px;
    border-radius: 8px;
    border: 2px solid #10b981;
    box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
}

.no-logo-placeholder {
    width: 60px;
    height: 60px;
    background: #374151;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border: 2px dashed #10b981;
}

.placeholder-icon {
    font-size: 1.5rem;
    color: #10b981;
}

.company-name-link {
    color: #10b981;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
}

.company-name-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.website-link {
    color: #10b981;
    text-decoration: none;
}

.website-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.no-website {
    color: #9ca3af;
    font-style: italic;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-icon {
    font-size: 0.9rem;
}

.contact-text {
    font-size: 0.9rem;
    color: #e5e7eb;
}

.no-contact {
    color: #9ca3af;
    font-style: italic;
    font-size: 0.9rem;
}

.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.button.small {
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
}

.delete-form {
    margin: 0;
}

.no-companies {
    text-align: center;
    padding: 3rem 1rem;
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.empty-icon {
    font-size: 3rem;
    color: #10b981;
}

.empty-state h3 {
    color: #10b981;
    margin: 0;
}

.empty-state p {
    color: #9ca3af;
    margin: 0;
}

.pagination-container {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.button.primary {
    background: #10b981;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
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
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: background-color 0.2s;
}

.button.secondary:hover {
    background: #4b5563;
}

.button.danger {
    background: #ef4444;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
}

.button.danger:hover {
    background: #dc2626;
}
</style>
@endsection


