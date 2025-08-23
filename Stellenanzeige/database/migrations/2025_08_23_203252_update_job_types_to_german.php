<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Bestehende englische Job-Typen in deutsche konvertieren
        DB::table('job_listings')
            ->where('type', 'full-time')
            ->update(['type' => 'Vollzeit']);

        DB::table('job_listings')
            ->where('type', 'part-time')
            ->update(['type' => 'Teilzeit']);

        DB::table('job_listings')
            ->where('type', 'contract')
            ->update(['type' => 'Befristet']);

        DB::table('job_listings')
            ->where('type', 'internship')
            ->update(['type' => 'Praktikum']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deutsche Job-Typen zurück in englische konvertieren
        DB::table('job_listings')
            ->where('type', 'Vollzeit')
            ->update(['type' => 'full-time']);

        DB::table('job_listings')
            ->where('type', 'Teilzeit')
            ->update(['type' => 'part-time']);

        DB::table('job_listings')
            ->where('type', 'Befristet')
            ->update(['type' => 'contract']);

        DB::table('job_listings')
            ->where('type', 'Praktikum')
            ->update(['type' => 'internship']);
    }
};
