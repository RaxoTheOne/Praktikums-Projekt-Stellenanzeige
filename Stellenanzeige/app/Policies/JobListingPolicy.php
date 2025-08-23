<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JobListing;
use App\Models\User;

class JobListingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen einsehen
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobListing $jobListing): bool
    {
        return true; // Alle angemeldeten Benutzer können einzelne Stellenanzeigen einsehen
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen erstellen
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobListing $jobListing): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen bearbeiten
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobListing $jobListing): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen löschen
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobListing $jobListing): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen wiederherstellen
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobListing $jobListing): bool
    {
        return true; // Alle angemeldeten Benutzer können Stellenanzeigen endgültig löschen
    }
}
