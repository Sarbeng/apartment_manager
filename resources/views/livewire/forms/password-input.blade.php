<div class="flex flex-col">
    {{-- The Master doesn't talk, he acts. --}}
    @if ($label)
        <label class=""> {{$label}} </label>
    @endif
    <input type="{{$type}}" placeholder="{{$placeholder}}" class="{{'border w-full'.$class}}"/>
    
</div>
