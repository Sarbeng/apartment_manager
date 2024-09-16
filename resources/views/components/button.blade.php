@props(['class','type'])
<button class=" w-full h-10 rounded mt-4 text-white {{$class}}" type="{{$type}}" {{$attributes}}>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    {{$slot}}
</button>