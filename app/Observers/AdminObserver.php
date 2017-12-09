<?php

namespace App\Observers;

use App\Admin;

class AdminObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\Admin  $admin
     * @return void
     */
    public function creating(Admin $admin)
    {
        // add access token to users table
         $admin->api_token = bin2hex(openssl_random_pseudo_bytes(30));
    }
}