<?php

use Illuminate\Support\Facades\Route;

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
