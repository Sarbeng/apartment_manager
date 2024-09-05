<div class="flex flex-col gap-1">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if ($label)
        <label class=""> {{$label}} </label>
    @endif
    <input type="{{$type}}" placeholder="{{$placeholder}}" class="{{$class.'border rounded w-full'}}"/>
    
</div>

