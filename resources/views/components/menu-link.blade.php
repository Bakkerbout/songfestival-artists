@props(['active' => false])

<a class="text-pink-400 @if($active) underline @endif" {{$attributes}}>{{$slot}}</a>
