<?php

namespace App\Policies;

use App\User;
use App\SalesGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalesGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the sales group.
     *
     * @param  \App\User  $user
     * @param  \App\SalesGroup  $salesGroup
     * @return mixed
     */
    public function view(User $user, SalesGroup $salesGroup)
    {
        //
    }

    /**
     * Determine whether the user can create sales groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the sales group.
     *
     * @param  \App\User  $user
     * @param  \App\SalesGroup  $salesGroup
     * @return mixed
     */
    public function update(User $user, SalesGroup $salesGroup)
    {
        //
    }

    /**
     * Determine whether the user can delete the sales group.
     *
     * @param  \App\User  $user
     * @param  \App\SalesGroup  $salesGroup
     * @return mixed
     */
    public function delete(User $user, SalesGroup $salesGroup)
    {
        if($user->organization_id === $salesGroup->organization_id){
        	return true;
        }
        
        else{
        	abort(403, 'This action is unauthorized');
        }
    }

    /**
     * Determine whether the user can restore the sales group.
     *
     * @param  \App\User  $user
     * @param  \App\SalesGroup  $salesGroup
     * @return mixed
     */
    public function restore(User $user, SalesGroup $salesGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the sales group.
     *
     * @param  \App\User  $user
     * @param  \App\SalesGroup  $salesGroup
     * @return mixed
     */
    public function forceDelete(User $user, SalesGroup $salesGroup)
    {
        //
    }
}
