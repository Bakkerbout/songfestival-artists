<x-app-layout>
    <title>Homepage</title>
    <h1>Homepage</h1>
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
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

