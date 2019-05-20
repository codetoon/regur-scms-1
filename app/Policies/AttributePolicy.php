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
    {
       $attributeSet= DB::table('attribute_sets')->join('attributes', 'attributes.attribute_set_id', '=',
       		'attribute_sets.id')->select('attribute_sets.*')->get();
       
       if($user->organization_id === $attributeSet->organization_id){
       		
       }
       
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
