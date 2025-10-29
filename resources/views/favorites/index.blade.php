<x-app-layout>
    <x-slot name="header">
        Favorites
    </x-slot>
    @if (Route::has('login'))
        @auth

        @else

        @endauth
    @endif
</x-app-layout>
