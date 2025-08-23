<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug/seed-demo', function () {
    abort_unless(app()->isLocal() || config('app.debug'), 403);
    $user = \App\Models\User::firstOrCreate(
        ['email' => 'demo@example.com'],
        [
            'name' => 'Demo User',
            'password' => bcrypt('Passwort123!'),
            'email_verified_at' => now(),
        ]
    );

    return response()->json([
        'created' => $user->wasRecentlyCreated,
        'user' => $user,
    ]);
});

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');
Route::get('/dashboard/export', [DashboardController::class, 'export'])->name('dashboard.export');

Route::resource('jobs', JobController::class);
Route::resource('companies', CompanyController::class);
Route::resource('categories', CategoryController::class);
