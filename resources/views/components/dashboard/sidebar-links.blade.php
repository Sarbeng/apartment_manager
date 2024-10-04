@props(['href' => '#','active' => false,'icon' => null])
<div>
    <a href="{{$href}}" class="flex items-center p-2 rounded-md gap-1 {{ $active ? 'bg-blue-900 text-white' : 'hover:bg-blue-900 hover:text-white'  }}">
        {{-- using dynamic icons because i hate having to rewrite code --}}
        @if($icon)
        <span class="w-6 h-6"> 
            <x-dynamic-component :component="$icon" />
        </span>
        @endif
        {{-- slot for additional items to be added --}}
        {{$slot}}
    </a>
</div>