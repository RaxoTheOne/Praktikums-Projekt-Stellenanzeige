@extends('layouts.app')

@section('title','Dashboard')

@section('content')
    <div class="panel">
        <div class="page-header">
            <h1 style="margin:0; color: #10b981;">📊 Dashboard</h1>
        </div>

        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">🏢</div>
                <div class="stat-content">
                    <div class="stat-number">{{ $companiesCount }}</div>
                    <div class="stat-label">Firmen</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">💼</div>
                <div class="stat-content">
                    <div class="stat-number">{{ $jobsCount }}</div>
                    <div class="stat-label">Stellenanzeigen</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🏷️</div>
                <div class="stat-content">
                    <div class="stat-number">{{ $categoriesCount }}</div>
                    <div class="stat-label">Kategorien</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-content">
                    <div class="stat-number">{{ $usersCount }}</div>
                    <div class="stat-label">Benutzer</div>
                </div>
            </div>
        </div>

        <div class="dashboard-actions">
            <h3 style="color: #10b981; margin-bottom: 1rem;">Schnellaktionen</h3>
            <div class="action-grid">
                <a href="{{ route('companies.create') }}" class="action-card">
                    <div class="action-icon">➕</div>
                    <div class="action-text">Neue Firma</div>
                </a>
                <a href="{{ route('jobs.create') }}" class="action-card">
                    <div class="action-icon">💼</div>
                    <div class="action-text">Neue Stelle</div>
                </a>
                <a href="{{ route('categories.create') }}" class="action-card">
                    <div class="action-icon">🏷️</div>
                    <div class="action-text">Neue Kategorie</div>
                </a>
                <a href="{{ route('companies.index') }}" class="action-card">
                    <div class="action-icon">🏢</div>
                    <div class="action-text">Firmen verwalten</div>
                </a>
                <a href="{{ route('jobs.index') }}" class="action-card">
                    <div class="action-icon">📋</div>
                    <div class="action-text">Stellen verwalten</div>
                </a>
                <a href="{{ route('categories.index') }}" class="action-card">
                    <div class="action-icon">📂</div>
                    <div class="action-text">Kategorien verwalten</div>
                </a>
            </div>
        </div>

        <div class="dashboard-recent">
            <h3 style="color: #10b981; margin-bottom: 1rem;">Letzte Aktivitäten</h3>
            <div class="recent-section">
                <h4 style="color: #e5e7eb; margin-bottom: 0.5rem;">Neueste Firmen</h4>
                @if($recentCompanies->count() > 0)
                    <div class="recent-list">
                        @foreach($recentCompanies as $company)
                            <div class="recent-item">
                                <a href="{{ route('companies.show', $company) }}" class="recent-link">
                                    {{ $company->name }}
                                </a>
                                <span class="recent-date">{{ $company->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="color: #9ca3af;">Keine Firmen vorhanden</p>
                @endif
            </div>

            <div class="recent-section">
                <h4 style="color: #e5e7eb; margin-bottom: 0.5rem;">Neueste Stellenanzeigen</h4>
                @if($recentJobs->count() > 0)
                    <div class="recent-list">
                        @foreach($recentJobs as $job)
                            <div class="recent-item">
                                <a href="{{ route('jobs.show', $job) }}" class="recent-link">
                                    {{ $job->title }}
                                </a>
                                <span class="recent-date">{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="color: #9ca3af;">Keine Stellenanzeigen vorhanden</p>
                @endif
            </div>
        </div>
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

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.stat-card:hover {
    border-color: #10b981;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(16, 185, 129, 0.2);
}

.stat-icon {
    font-size: 2rem;
    color: #10b981;
}

.stat-content {
    flex-grow: 1;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #e5e7eb;
    line-height: 1;
}

.stat-label {
    color: #9ca3af;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.dashboard-actions {
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.action-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
}

.action-card {
    background: #374151;
    border: 1px solid #4b5563;
    border-radius: 6px;
    padding: 1rem;
    text-align: center;
    text-decoration: none;
    color: #e5e7eb;
    transition: all 0.2s;
}

.action-card:hover {
    border-color: #10b981;
    background: #4b5563;
    transform: translateY(-2px);
}

.action-icon {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.action-text {
    font-weight: 500;
    font-size: 0.875rem;
}

.dashboard-recent {
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 8px;
    padding: 1.5rem;
}

.recent-section {
    margin-bottom: 1.5rem;
}

.recent-section:last-child {
    margin-bottom: 0;
}

.recent-list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.recent-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: #374151;
    border-radius: 4px;
    border: 1px solid #4b5563;
}

.recent-item:hover {
    border-color: #10b981;
    background: #4b5563;
}

.recent-link {
    color: #10b981;
    text-decoration: none;
    font-weight: 500;
}

.recent-link:hover {
    color: #34d399;
    text-decoration: underline;
}

.recent-date {
    color: #9ca3af;
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .dashboard-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .action-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .recent-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>
@endsection
