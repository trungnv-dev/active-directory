<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Site Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("List sites registed.") }}
        </p>
    </header>
    <br>
    <button class ="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            onclick="location.href='{{ route('admin.sites.create') }}'">
        {{ __('Add Site') }}
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th style="width: 450px;" scope="col">Hash Name</th>
                <th style="width: 300px;" scope="col">Info Connection</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        {{ $sites->links() }}
            @forelse ($sites as $site)
            <tr>
                <th>{{ $site->id }}</th>
                <td>{{ $site->name }}</td>
                <td>
                    <p>{{ $site->connection['hosts'] }}</p>
                    <p>{{ $site->connection['base_dn'] }}</p>
                    <p>{{ $site->connection['port'] }}</p>
                </td>
                <td>
                    <button class ="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                            onclick="window.open('{{ route('login', ['name' => $site->name]) }}')">
                        {{ __('Go to site') }}
                    </button>
                    <button class ="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            onclick="location.href='{{ route('admin.sites.create') }}'">
                        {{ __('Edit') }}
                    </button>
                    <button class ="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            onclick="location.href='{{ route('admin.sites.create') }}'">
                        {{ __('Delete') }}
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">{{ __('No sites') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</section>
