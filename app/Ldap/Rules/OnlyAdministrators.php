<?php

namespace App\Ldap\Rules;

use Illuminate\Support\Facades\Auth;
use LdapRecord\Laravel\Auth\Rule;

class OnlyAdministrators extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @url https://ldaprecord.com/docs/laravel/v2/auth/restricting-login/#using-a-group-membership
     * 
     * @return bool
     */
    public function isValid()
    {
        return $this->user->groups()->exists('Administrators');
    }
}
