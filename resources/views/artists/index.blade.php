<x-app-layout>
    <h1>Artists</h1>
    <a href="{{ route('artists.create') }}">Create</a>
    <ul>
        @foreach($artists as $artist)
            <li><a href="{{route('artists.show', $artist)}}"> {{$artist->name}}</a></li>
        @endforeach
    </ul>
</x-app-layout>

