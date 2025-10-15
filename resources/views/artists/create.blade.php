<x-app-layout>
    <form method="POST" action="{{ route('artists.store') }}">
        @csrf
        <div>
            <label for="name">Artist name:</label><br>
            <input type="text" id="name" name="name" value="{{old('name')}}"><br>
        </div>
        @error('name')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div>
            <label for="song">Song:</label><br>
            <input type="text" id="song" name="song" value="{{old('song')}}">
        </div>
        @error('song')
        <div class=" text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div>
            <label for="final_position">Final Position:</label><br>
            <input type="number" id="final_position" name="final_position" value="{{old('final_position')}}">
        </div>
        @error('final_position')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div>
            <label for="year">Year:</label><br>
            <input type="number" id="year" name="year" value="{{old('year')}}">
        </div>
        @error('year')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
        <div>
            <label for="country_id">Country:</label><br>
            <select id="country_id" name="country_id">
                @foreach ($countries as $country)
                    <option value="{{$country->id}}"> {{$country->name}}</option>
            @endforeach
        </div>
        <div>
            <input type="submit" id="submit" name="submit">
        </div>
    </form>
</x-app-layout>
