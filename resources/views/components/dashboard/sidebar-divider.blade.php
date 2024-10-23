@props(['label' => null])
<div class=" text-blue-900 capitalize font-semibold  p-2 mb-4  {{ $label ? 'border-b border-blue-900' : '' }}">
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    {{$label}}
</div>