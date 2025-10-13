<x-app-layout>
    <title>Favorites</title>
    <h1>Favorites</h1>
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                Je bent ingelogd
                <a href="{{ route('logout') }}">
                    Log out
                </a>
            @else
                Je bent niet ingelogd
                <a href="{{ route('login') }}">
                    Log in
                </a>
        </nav>
    @endauth
    @endif
</x-app-layout>
