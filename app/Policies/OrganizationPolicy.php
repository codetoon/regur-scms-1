<?php

namespace App\Policies;

use App\User;
use App\Organization;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the organization.
     *
     * @param  \App\User  $user
     * @param  \App\Organization  $organization
     * @return mixed
     */
    public function view(User $user, Organization $organization)
    {
        
    }

    /**
     * Determine whether the user can create organizations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the organization.
     *
     * @param  \App\User  $user
     * @param  \App\Organization  $organization
     * @return mixed
     */
    public function update(User $user, Organization $organization)
    {
    	if($user->organization_id === $organization->id){
    		return true;
    	}
    	
    	else{
    		abort(403, 'This action is unauthorized');
    	}
    }

    /**
     * Determine whether the user can delete the organization.
     *
     * @param  \App\User  $user
     * @param  \App\Organization  $organization
     * @return mixed
     */
    public function delete(User $user, Organization $organization)
    {
    	//
    }

    /**
     * Determine whether the user can restore the organization.
     *
     * @param  \App\User  $user
     * @param  \App\Organization  $organization
     * @return mixed
     */
    public function restore(User $user, Organization $organization)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the organization.
     *
     * @param  \App\User  $user
     * @param  \App\Organization  $organization
     * @return mixed
     */
    public function forceDelete(User $user, Organization $organization)
    {
        //
    }
}
