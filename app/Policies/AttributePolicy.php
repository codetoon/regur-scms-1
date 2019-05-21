<?php

namespace App\Policies;

use App\User;
use App\Attribute;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\AttributeSet;
use App\Organization;
use Illuminate\Support\Facades\DB;

class AttributePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attribute.
     *
     * @param  \App\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function view(User $user, Attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can create attributes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the attribute.
     *
     * @param  \App\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function update(User $user, Attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can delete the attribute.
     *
     * @param  \App\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function delete(User $user, Attribute $attribute)
    {	$attributeSet= AttributeSet::where('id', $attribute->attribute_set_id)->get();
    	return $user->organization_id === $attributeSet[0]->organization_id;
       
    }

    /**
     * Determine whether the user can restore the attribute.
     *
     * @param  \App\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function restore(User $user, Attribute $attribute)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the attribute.
     *
     * @param  \App\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function forceDelete(User $user, Attribute $attribute)
    {
        //
    }
}
