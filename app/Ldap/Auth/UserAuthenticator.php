<?php

namespace App\Ldap\Auth;

use App\Ldap\Models\OrganizationalUnit;
use LdapRecord\Models\Model;
use LdapRecord\Laravel\LdapUserAuthenticator;

class UserAuthenticator extends LdapUserAuthenticator
{
    /**
     * Attempt authenticating against the LDAP domain.
     *
     * @param Model  $user
     * @param string $password
     * 
     * @url https://github.com/DirectoryTree/LdapRecord-Docs/blob/master/laravel/v2/extending.md
     *
     * @return bool
     */
    public function attempt(Model $user, $password)
    {
        $organization = OrganizationalUnit::where('ou', 'CS')->first();
        if (! ($organization && $user->dnIsInside($user->getDn(), $organization->getDn()))) {
            return false;
        }

        // Attempt authentication...
        $this->attempting($user);

        if ($this->databaseModelIsTrashed()) {
            $this->trashed($user);

            return false;
        }

        // Here we will attempt to bind the authenticating LDAP
        // user to our connection to ensure their password is
        // correct, using the defined authenticator closure.
        if (! call_user_func($this->authenticator, $user, $password)) {
            $this->failed($user);

            return false;
        }

        // Now we will perform authorization on the LDAP user. If all
        // validation rules pass, we will allow the authentication
        // attempt. Otherwise, it is automatically rejected.
        if (! $this->validate($user)) {
            $this->rejected($user);

            return false;
        }

        $this->passed($user);

        return true;
    }
}