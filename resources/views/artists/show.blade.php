<x-app-layout>
    <h1>Artist: {{$artist->name}}</h1>
    <p>Song: {{$artist->song}}</p>
    <ul>
        <li>Year: {{$artist->year}}</li>
        <li>Final position: {{$artist->final_position}}</li>
        <li>Country: {{$artist->country->name}}</li>
    </ul>
</x-app-layout>
