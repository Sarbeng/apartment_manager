<div class="flex flex-col">
    {{-- The Master doesn't talk, he acts. --}}
    @if ($label)
        <label class=""> {{$label}} </label>
    @endif
    <div class="flex gap-1">
        <input type="{{$type}}" placeholder="{{$placeholder}}" class="{{'border w-full'.$class}}"/>
        {{-- Toggle Password Visibility --}}
        <button type="button" wire:click="togglePasswordVisibility" class="  inset-y-0 right-0 flex items-center px-2">
            @if ($isPasswordVisible)
            {{--Show 'hide' icon --}}
            hide
            @else
            {{--Show 'Show' icon --}}
            Show
            @endif
        </button>
    </div>
    
</div>
