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
</x-app-layout>
