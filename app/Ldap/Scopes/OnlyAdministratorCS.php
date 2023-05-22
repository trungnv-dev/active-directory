<?php

namespace App\Ldap\Scopes;

use LdapRecord\Models\Model;
use LdapRecord\Models\Scope;
use LdapRecord\Query\Model\Builder;

class OnlyAdministratorCS implements Scope
{
    /**
     * Apply the scope to the given query.
     *
     * @param Builder $query
     * @param Model   $model
     * 
     * @url https://ldaprecord.com/docs/laravel/v2/auth/restricting-login/#using-an-organizational-unit
     *
     * @return void
     */
    public function apply(Builder $query, Model $model)
    {
        $query->in(env('LDAP_ADMIN_USER_SCOPE'));
    }
}
