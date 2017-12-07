<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Carbon;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        // add access token to users table
         $user->api_token = bin2hex(openssl_random_pseudo_bytes(20));
       
        // add student number to users table
        $users = User::all()->count();
        $date = Carbon::now();
        $user->student_number = $date->year. '' .$date->month. '' . $users + 1;
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}