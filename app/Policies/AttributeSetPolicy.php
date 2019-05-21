<?php

namespace App\Policies;

use App\User;
use App\AttributeSet;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributeSetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attribute set.
     *
     * @param  \App\User  $user
     * @param  \App\AttributeSet  $attributeSet
     * @return mixed
     */
    public function view(User $user, AttributeSet $attributeSet)
    {
        //
    }

    /**
     * Determine whether the user can create attribute sets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the attribute set.
     *
     * @param  \App\User  $user
     * @param  \App\AttributeSet  $attributeSet
     * @return mixed
     */
    public function update(User $user, AttributeSet $attributeSet)
    {
        return $user->organization_id === $attributeSet->organization_id;
    }

    /**
     * Determine whether the user can delete the attribute set.
     *
     * @param  \App\User  $user
     * @param  \App\AttributeSet  $attributeSet
     * @return mixed
     */
    public function delete(User $user, AttributeSet $attributeSet)
    {
        return $user->organization_id === $attributeSet->organization_id;
    }

    /**
     * Determine whether the user can restore the attribute set.
     *
     * @param  \App\User  $user
     * @param  \App\AttributeSet  $attributeSet
     * @return mixed
     */
    public function restore(User $user, AttributeSet $attributeSet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the attribute set.
     *
     * @param  \App\User  $user
     * @param  \App\AttributeSet  $attributeSet
     * @return mixed
     */
    public function forceDelete(User $user, AttributeSet $attributeSet)
    {
        //
    }
}
