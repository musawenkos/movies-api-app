@php
   $type="tv";
@endphp
<x-layout>
    <x-trailerInfo  :mediaType="$type" :trailerInfo="$seriesInfo" :trailerVideo="$seriesVideo" />
</x-layout>
