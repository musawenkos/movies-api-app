@php
   $type="movie";
@endphp

<x-layout>
    <x-trailerInfo :mediaType="$type" :trailerInfo="$movieInfo" :trailerVideo="$movieVideo" />
</x-layout>
