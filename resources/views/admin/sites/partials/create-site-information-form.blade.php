<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Site Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.sites.create') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="host" :value="__('Hosts')" />
            <x-text-input id="host" name="host" type="text" class="mt-1 block w-full" :value="old('host')" required autofocus placeholder="192.168.1.1" />
            <x-input-error class="mt-2" :messages="$errors->get('host')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('UserName')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username')" required autofocus placeholder="cn=user,dc=local,dc=com" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password')" required autofocus placeholder="password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="port" :value="__('Port')" />
            <x-text-input id="port" name="port" type="text" class="mt-1 block w-full" :value="old('port')" required autofocus placeholder="389" />
            <x-input-error class="mt-2" :messages="$errors->get('port')" />
        </div>

        <div>
            <x-input-label for="base_dn" :value="__('BaseDn')" />
            <x-text-input id="base_dn" name="base_dn" type="text" class="mt-1 block w-full" :value="old('base_dn')" required autofocus placeholder="dc=local,dc=com" />
            <x-input-error class="mt-2" :messages="$errors->get('base_dn')" />
        </div>

        <div>
            <x-input-label for="timeout" :value="__('TimeOut')" />
            <x-text-input id="timeout" name="timeout" type="number" class="mt-1 block w-full" :value="old('timeout')" required autofocus placeholder="5" />
            <x-input-error class="mt-2" :messages="$errors->get('timeout')" />
        </div>

        <div>
            <x-input-label for="use_ssl" :value="__('UseSSL')" />
            <x-text-input id="use_ssl" name="use_ssl" type="checkbox" class="mt-1 block w-full" :value="old('use_ssl')" autofocus placeholder="5" />
            <x-input-error class="mt-2" :messages="$errors->get('use_ssl')" />
        </div>

        <div>
            <x-input-label for="use_tls" :value="__('UseTLS')" />
            <x-text-input id="use_tls" name="use_tls" type="checkbox" class="mt-1 block w-full" :value="old('use_tls')" autofocus placeholder="5" />
            <x-input-error class="mt-2" :messages="$errors->get('use_tls')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'site-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Created.') }}</p>
            @endif
        </div>
    </form>
</section>
