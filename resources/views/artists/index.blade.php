<x-app-layout>
    <x-slot name="header">
        Artists
    </x-slot>
    <a href="{{ route('artists.create') }}">Create</a>
    <p class="text-gray-700 mb-6">The total amount of artists found: {{ $artists->count() }}</p>

    <div class="mb-6 flex items-center space-x-2">
        <span class="text-black font-medium">Filter:</span>
        <button class="bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-3 py-1 rounded">Country</button>
        <button class="bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-3 py-1 rounded">Year</button>
        <button class="bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-3 py-1 rounded">Final position
        </button>

        <input type="text" placeholder="Search artist or song" class="border rounded px-3 py-1 ml-2"/>
        <button class="bg-blue-300 text-black px-3 py-1 rounded hover:bg-blue-900 hover:text-white">Search</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($artists as $artist)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                {{--                <img src="{{ $artist->image_url }}" alt="{{ $artist->song }}" class="w-full h-48 object-cover">--}}
                <div class="p-4">
                    <h2 class="text-lg font-semibold text-black">{{ $artist->name }}</h2>
                    <p class="text-sm text-black mt-2">{{ Str::limit($artist->song, 80) }}</p>
                    <a href="{{ route('artists.show', $artist) }}"
                       class=" inline-block mt-3 bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-3 py-1 rounded">
                        See details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
