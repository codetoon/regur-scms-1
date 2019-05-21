<?php

namespace App\Policies;

use App\User;
use App\UnitOfMeasure;
use Illuminate\Auth\Access\HandlesAuthorization;


class UnitOfMeasurePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the unit of measure.
     *
     * @param  \App\User  $user
     * @param  \App\UnitOfMeasure  $unitOfMeasure
     * @return mixed
     */
    public function view(User $user, UnitOfMeasure $unitOfMeasure)
    {
        //
    }

    /**
     * Determine whether the user can create unit of measures.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the unit of measure.
     *
     * @param  \App\User  $user
     * @param  \App\UnitOfMeasure  $unitOfMeasure
     * @return mixed
     */
    public function update(User $user, UnitOfMeasure $unitOfMeasure)
    {
        return $user->organization_id === $unitOfMeasure->organization_id;
    }

    /**
     * Determine whether the user can delete the unit of measure.
     *
     * @param  \App\User  $user
     * @param  \App\UnitOfMeasure  $unitOfMeasure
     * @return mixed
     */
    public function delete(User $user, UnitOfMeasure $unitOfMeasure)
    {
    	return $user->organization_id === $unitOfMeasure->organization_id;
    }

    /**
     * Determine whether the user can restore the unit of measure.
     *
     * @param  \App\User  $user
     * @param  \App\UnitOfMeasure  $unitOfMeasure
     * @return mixed
     */
    public function restore(User $user, UnitOfMeasure $unitOfMeasure)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the unit of measure.
     *
     * @param  \App\User  $user
     * @param  \App\UnitOfMeasure  $unitOfMeasure
     * @return mixed
     */
    public function forceDelete(User $user, UnitOfMeasure $unitOfMeasure)
    {
        //
    }
}
