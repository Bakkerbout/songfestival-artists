<x-app-layout>
    <x-slot name="header">
        Create Artist
    </x-slot>
    <div class="flex justify-center items-center ">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('artists.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-medium">Artist Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="w-full border border-gray-300 p-2 rounded">
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="song" class="block mb-1 font-medium">Song:</label>
                    <input type="text" id="song" name="song" value="{{ old('song') }}"
                           class="w-full border border-gray-300 p-2 rounded">
                    @error('song')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="final_position" class="block mb-1 font-medium">Final Position:</label>
                    <input type="number" id="final_position" name="final_position"
                           value="{{ old('final_position') }}"
                           class="w-full border border-gray-300 p-2 rounded">
                    @error('final_position')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="year" class="block mb-1 font-medium">Year:</label>
                    <input type="number" id="year" name="year" value="{{ old('year') }}"
                           class="w-full border border-gray-300 p-2 rounded">
                    @error('year')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="country_id" class="block mb-1 font-medium">Country:</label>
                    <select id="country_id" name="country_id" class="w-full border border-gray-300 p-2 rounded">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="image" class="block mb-1 font-medium">Image:</label>
                    <input type="file" id="image" name="image" accept="image/" value="{{old('image')}}"
                           class="border rounded p-2">
                    @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <input type="submit" value="Create Artist"
                           class="w-full bg-blue-900 text-white py-3 rounded hover:bg-blue-700 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
