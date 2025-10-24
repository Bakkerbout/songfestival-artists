<x-app-layout>
    <x-slot name="header">
        Songfestival Artists
    </x-slot>
    <p class="text-gray-700 mb-6">The total amount of artists found: {{ $artists->count() }}</p>

    <div class="mb-6 flex items-center space-x-2">
        <span class="text-black font-medium">Filter:</span>
        <form method="GET" action="{{ route('artists.index') }}">
            <select class="py-1 rounded" name="country" onchange="this.form.submit()">
                <option value="">All countries</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>

            <select class="py-1 rounded" name="year" onchange="this.form.submit()">
                <option value="">All years</option>
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>

            <select class="py-1 rounded" name="final_position" onchange="this.form.submit()">
                <option value="">All positions</option>
                @foreach($finalPositions as $position)
                    <option value="{{ $position }}" {{ request('final_position') == $position ? 'selected' : '' }}>
                        {{ $position }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" placeholder="Search artist or song"
                   value="{{ request('search') }}"
                   class="border rounded py-1"/>
            <button type="submit" class="bg-blue-300 text-black px-3 py-1 rounded hover:bg-blue-900 hover:text-white">
                Search
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($artists as $artist)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                {{--                <img src="{{ $artist->image_url }}" alt="{{ $artist->song }}" class="w-full h-48 object-cover">--}}
                <div class="p-4">
                    {{--                    Misschien nog een image (vlag) van het land toevoegen??--}}
                    <h2 class="text-lg font-semibold text-black">{{ $artist->name }}</h2>
                    <p class="text-sm text-black mt-2">{{ Str::limit($artist->song, 80) }}</p>
                    <div class="flex items-center space-x-52">

                        <a href="{{ route('artists.show', $artist) }}"
                           class=" inline-block mt-3 bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-3 py-1 rounded">
                            See details
                        </a>
                        <p class="flex text-base text-black">{{ $artist->year }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
