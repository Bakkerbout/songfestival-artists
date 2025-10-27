<nav class="bg-blue-900 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <div class="flex items-center space-x-8">
            <a href="{{ url('/') }}" class="text-xl text-white font-semibold">
                Songfestival Artists
            </a>
            <x-menu-link href="{{ route('artists.index') }}" :active="Route::is('artists.index')">
                Artists
            </x-menu-link>
            @if (Route::has('login'))
                @auth
                    <x-menu-link href="{{ route('favorite.index') }}" :active="Route::is('favorite.index')">
                        Favorites
                    </x-menu-link>

                    <x-menu-link href="{{ route('artists.create') }}" :active="Route::is('artists.create')">
                        Create Artist
                    </x-menu-link>
                @else
                @endauth
            @endif
            @if (Route::has(''))
                @auth
                    <x-menu-link href="{{ route('artists.create') }}" :active="Route::is('artists.create')">
                        Create Artist
                    </x-menu-link>
                @else
                @endauth
            @endif
        </div>
        <div class="flex items-center space-x-4">
            @auth
                <span class="text-white">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
            @endauth
        </div>
    </div>
</nav>
