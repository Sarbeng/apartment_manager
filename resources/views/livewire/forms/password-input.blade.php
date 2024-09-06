<div class="flex flex-col">
    {{-- The Master doesn't talk, he acts. --}}
    @if ($label)
        <label class=""> {{$label}} </label>
    @endif
    <div class="flex w-full gap-1"> 
        <input type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" id="{{$name}}" wire:model="{{$model}}"  class="{{'border rounded w-full w-10/12 '.$class}}" wire:model="password"/>
        {{-- Toggle Password Visibility --}}
        <button type="button" wire:click="togglePasswordVisibility" class="inset-y-0 right-0 flex h-10 rounded justify-center items-center px-2 w-2/12 border">
            @if ($isPasswordVisible)
            {{--Show 'hide' icon --}}
           
            <x-heroicon-o-eye-slash class="text-gray-800 w-5 h-5"/>
            @else
            {{--Show 'Show' icon --}}
            <x-heroicon-o-eye class="text-gray-800 w-5 h-5"/>
            @endif
        </button>
    </div>
    <div>
        @error($model) <span class="error">{{ $message }}</span> @enderror 
    </div>
</div>
