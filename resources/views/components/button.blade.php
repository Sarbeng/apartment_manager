@props(['class','type'])
<button class="bg-blue-800 h-10 rounded mt-4 text-white {{$class}}" type="{{$type}}">
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    {{$slot}}
</button>