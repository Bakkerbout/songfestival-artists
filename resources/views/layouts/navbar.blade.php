<nav class="my-6 flex gap-4">
    <x-menu-link href="{{route('homepage')}}" :active="Route::is('homepage')">Home</x-menu-link>
    <x-menu-link href="{{route('artists.index')}}" :active="Route::is('artists.index')">Artists</x-menu-link>
    <x-menu-link href="{{route('favorites')}}" :active="Route::is('favorites')">Favorites</x-menu-link>
</nav>
