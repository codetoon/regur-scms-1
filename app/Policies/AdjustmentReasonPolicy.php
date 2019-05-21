<?php

namespace App\Policies;

use App\User;
use App\AdjustmentReason;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdjustmentReasonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the adjustment reason.
     *
     * @param  \App\User  $user
     * @param  \App\AdjustmentReason  $adjustmentReason
     * @return mixed
     */
    public function view(User $user, AdjustmentReason $adjustmentReason)
    {
        //
    }

    /**
     * Determine whether the user can create adjustment reasons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the adjustment reason.
     *
     * @param  \App\User  $user
     * @param  \App\AdjustmentReason  $adjustmentReason
     * @return mixed
     */
    public function update(User $user, AdjustmentReason $adjustmentReason)
    {
    	return $user->organization_id === $adjustmentReason->organization_id;
    }

    /**
     * Determine whether the user can delete the adjustment reason.
     *
     * @param  \App\User  $user
     * @param  \App\AdjustmentReason  $adjustmentReason
     * @return mixed
     */
    public function delete(User $user, AdjustmentReason $adjustmentReason)
    {
        return $user->organization_id === $adjustmentReason->organization_id;
    }

    /**
     * Determine whether the user can restore the adjustment reason.
     *
     * @param  \App\User  $user
     * @param  \App\AdjustmentReason  $adjustmentReason
     * @return mixed
     */
    public function restore(User $user, AdjustmentReason $adjustmentReason)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the adjustment reason.
     *
     * @param  \App\User  $user
     * @param  \App\AdjustmentReason  $adjustmentReason
     * @return mixed
     */
    public function forceDelete(User $user, AdjustmentReason $adjustmentReason)
    {
        //
    }
}
