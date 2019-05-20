<?php

namespace App\Policies;

use App\User;
use App\CreditReason;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;


class CreditReasonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the credit reason.
     *
     * @param  \App\User  $user
     * @param  \App\CreditReason  $creditReason
     * @return mixed
     */
    public function view(User $user, CreditReason $creditReason)
    {
    	return $user->organization_id === $creditReason->organization_id;
    	/* $creditReason= CreditReason::get()->all();
    	
    	 foreach($creditReason as $key=> $value){
    		if($user->organization_id == $value->organization_id){
    			$result[]= true; 
    		}
    	} 
    		
    	if(sizeof($result)>0){
    		return true;
    	}
    	
    	else{
    		return false;
    	} */
    	
    }

    /**
     * Determine whether the user can create credit reasons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
    	//
    }

    /**
     * Determine whether the user can update the credit reason.
     *
     * @param  \App\User  $user
     * @param  \App\CreditReason  $creditReason
     * @return mixed
     */
    public function update(User $user, CreditReason $creditReason)
    {
    if($user->organization_id === $creditReason->organization_id){
       	
       		return true;
       }
       
       else{
       		abort('403', 'This action is unauthorized');
       	
       }
    }

    /**
     * Determine whether the user can delete the credit reason.
     *
     * @param  \App\User  $user
     * @param  \App\CreditReason  $creditReason
     * @return mixed
     */
    public function delete(User $user, CreditReason $creditReason)
    {
       if($user->organization_id === $creditReason->organization_id){
       	
       		return true;
       }
       
       else{
       		abort('403', 'This action is unauthorized');
       	
       }
       
       
    }

    /**
     * Determine whether the user can restore the credit reason.
     *
     * @param  \App\User  $user
     * @param  \App\CreditReason  $creditReason
     * @return mixed
     */
    public function restore(User $user, CreditReason $creditReason)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the credit reason.
     *
     * @param  \App\User  $user
     * @param  \App\CreditReason  $creditReason
     * @return mixed
     */
    public function forceDelete(User $user, CreditReason $creditReason)
    {
        //
    }
}
