<x-app-layout>
    <div class="flex flex-col md:flex-row gap-6 mt-3">
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-2">Artist: {{$artist->name}}</h1>
            <p class="mb-3">Song: {{$artist->song}}</p>
            <ul class="space-y-2">
                <li>Year: {{$artist->year}}</li>
                <li>Final position: {{$artist->final_position}}</li>
                <li>Country: {{$artist->country->name}}</li>
            </ul>
        </div>
        <div class="mt-3 md:w-1/2">
            <img src="{{ asset('storage/' . $artist->image) }}"
                 alt="{{ $artist->name }}"
                 class="w-full h-96 object-cover rounded-lg shadow-md">
        </div>
    </div>
    @auth
        @if(Auth::id() === $artist->user_id && $userArtistCount >= 3)
            <a href="{{ route('artists.edit', $artist->id) }}"
               class="inline-block mt-3 bg-blue-900 text-white hover:bg-blue-300 hover:text-black px-72 py-1 rounded">
                Edit
            </a>
        @endif

        @if(Auth::id() === $artist->user_id && $userArtistCount < 3)
            <div class="text-red-500 text-base">You must have added at least 3 artists before you can edit this
                artist.
            </div>
        @endif
    @endauth
</x-app-layout>
