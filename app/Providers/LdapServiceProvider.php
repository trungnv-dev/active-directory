<?php

namespace App\Providers;

use App\Models\Site;
use Illuminate\Support\Facades\Config;
use LdapRecord\Laravel\LdapServiceProvider as ServiceProvider;

class LdapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $segments = request()->segments();

        if (is_array($segments) && $segments) {
            if ($segments[0] == 'sites') {
                $site = Site::where('name', $segments[1] ?? null)->firstOrFail();
                Config::set('ldap.connections', [
                    env('LDAP_CONNECTION', 'default') => [
                        "hosts"    => [$site['connection']['hosts']],
                        "username" => $site['connection']['username'],
                        "password" => $site['connection']['password'],
                        "port"     => (int) $site['connection']['port'],
                        "base_dn"  => $site['connection']['base_dn'],
                        "timeout"  => $site['connection']['timeout'],
                        "use_ssl"  => (bool) ($site['connection']['use_ssl'] ?? false),
                        "use_tls"  => (bool) ($site['connection']['use_tls'] ?? false),
                    ]
                ]);
                $this->registerLdapConnections();
            }
        }
    }
}
