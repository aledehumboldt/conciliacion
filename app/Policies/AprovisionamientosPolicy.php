<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Aprovisionamiento;
use Illuminate\Auth\Access\Response;

class AprovisionamientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Aprovisionamiento $Aprovisionamiento): bool {
        //
    }

    /**
     * Determine whether the user can create models jowel and randy.
     */
    public function create(User $user): bool {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Aprovisionamiento $Aprovisionamiento): bool {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Aprovisionamiento $Aprovisionamiento): bool {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Aprovisionamiento $Aprovisionamiento): bool {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Aprovisionamiento $Aprovisionamiento): bool {
        //
    }
}
