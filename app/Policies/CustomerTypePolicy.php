<?php

namespace App\Policies;

use App\User;
use App\CustomerType;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the customer type.
     *
     * @param  \App\User  $user
     * @param  \App\CustomerType  $customerType
     * @return mixed
     */
    public function view(User $user, CustomerType $customerType)
    {
        //
    }

    /**
     * Determine whether the user can create customer types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the customer type.
     *
     * @param  \App\User  $user
     * @param  \App\CustomerType  $customerType
     * @return mixed
     */
    public function update(User $user, CustomerType $customerType)
    {
    	return $user->organization_id === $customerType->organization_id;
    	
    }

    /**
     * Determine whether the user can delete the customer type.
     *
     * @param  \App\User  $user
     * @param  \App\CustomerType  $customerType
     * @return mixed
     */
    public function delete(User $user, CustomerType $customerType)
    {
        return $user->organization_id === $customerType->organization_id;
    }

    /**
     * Determine whether the user can restore the customer type.
     *
     * @param  \App\User  $user
     * @param  \App\CustomerType  $customerType
     * @return mixed
     */
    public function restore(User $user, CustomerType $customerType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the customer type.
     *
     * @param  \App\User  $user
     * @param  \App\CustomerType  $customerType
     * @return mixed
     */
    public function forceDelete(User $user, CustomerType $customerType)
    {
        //
    }
}
