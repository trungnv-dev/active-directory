<?php

namespace App\Ldap\Models;

use App\Ldap\Scopes\OnlyAdministratorCS;
use LdapRecord\Models\ActiveDirectory\User as ActiveDirectoryUser;
use LdapRecord\Query\Model\Builder;

class User extends ActiveDirectoryUser
{
    /**
     * Property which will contain the name of the attribute your LDAP directory uses to store its unique identifier, default objectguid.
     *
     * @return void
     */
    protected $guidKey = 'objectguid';

    /**
     * The "booting" method of the model.
     * 
     * @url https://ldaprecord.com/docs/laravel/v2/auth/restricting-login/#using-an-organizational-unit
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // return static::addGlobalScope(new OnlyAdministratorCS);
    }

    /**
     * Apply the scope to the query.
     *
     * @param Builder $builder
     * 
     * @url https://ldaprecord.com/docs/core/v2/model-scopes/#using-a-local-scope
     *
     * @return Builder
     */
    public function scopeAdminCs(Builder $query)
    {
        return $query->in(env('LDAP_ADMIN_USER_SCOPE'));
    }
}
