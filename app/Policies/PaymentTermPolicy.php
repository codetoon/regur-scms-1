<?php

namespace App\Policies;

use App\User;
use App\PaymentTerm;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentTermPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the payment term.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentTerm  $paymentTerm
     * @return mixed
     */
    public function view(User $user, PaymentTerm $paymentTerm)
    {
        //
    }

    /**
     * Determine whether the user can create payment terms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the payment term.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentTerm  $paymentTerm
     * @return mixed
     */
    public function update(User $user, PaymentTerm $paymentTerm)
    {
    	return $user->organization_id === $paymentTerm->organization_id;
    }

    /**
     * Determine whether the user can delete the payment term.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentTerm  $paymentTerm
     * @return mixed
     */
    public function delete(User $user, PaymentTerm $paymentTerm)
    {
    	return $user->organization_id === $paymentTerm->organization_id;
    }
 
    /**
     * Determine whether the user can restore the payment term.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentTerm  $paymentTerm
     * @return mixed
     */
    public function restore(User $user, PaymentTerm $paymentTerm)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the payment term.
     *
     * @param  \App\User  $user
     * @param  \App\PaymentTerm  $paymentTerm
     * @return mixed
     */
    public function forceDelete(User $user, PaymentTerm $paymentTerm)
    {
        //
    }
}
