<?php

namespace App\Policies;

use App\User;
use App\SupplierReturnReason;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierReturnReasonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the supplier return reason.
     *
     * @param  \App\User  $user
     * @param  \App\SupplierReturnReason  $supplierReturnReason
     * @return mixed
     */
    public function view(User $user, SupplierReturnReason $supplierReturnReason)
    {	//
    }

    /**
     * Determine whether the user can create supplier return reasons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the supplier return reason.
     *
     * @param  \App\User  $user
     * @param  \App\SupplierReturnReason  $supplierReturnReason
     * @return mixed
     */
    public function update(User $user, SupplierReturnReason $supplierReturnReason)
    {	
        return $user->organization_id === $supplierReturnReason->organization_id;
    }

    /**
     * Determine whether the user can delete the supplier return reason.
     *
     * @param  \App\User  $user
     * @param  \App\SupplierReturnReason  $supplierReturnReason
     * @return mixed
     */
    public function delete(User $user, SupplierReturnReason $supplierReturnReason)
    {	
        return $user->organization_id === $supplierReturnReason->organization_id;
    }

    /**
     * Determine whether the user can restore the supplier return reason.
     *
     * @param  \App\User  $user
     * @param  \App\SupplierReturnReason  $supplierReturnReason
     * @return mixed
     */
    public function restore(User $user, SupplierReturnReason $supplierReturnReason)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the supplier return reason.
     *
     * @param  \App\User  $user
     * @param  \App\SupplierReturnReason  $supplierReturnReason
     * @return mixed
     */
    public function forceDelete(User $user, SupplierReturnReason $supplierReturnReason)
    {
        //
    }
}
