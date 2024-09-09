@props(['name','class','label','toggle_password'])
<div x-data="{ show: false }" class="mb-3">
    <label for="password" class=" mb-2 text-sm capitalize ">{{$label}}</label>

    <div class="flex">
        <!-- Password Input -->
    <input name="{{$name}}" :type="show ? 'text' : 'password'" id="password" 
    class=" border rounded-l w-full py-2 px-3 text-gray-700 leading-tight h-10 {{$class}} "
    placeholder="" {{$attributes}}>

<!-- Toggle Checkbox -->
<div class="px-2 flex items-center border rounded-r h-10">
    <input type="checkbox" id="{{$toggle_password}}" x-model="show" class="hidden">
    <label for="{{$toggle_password}}" class="cursor-pointer">
        <x-heroicon-o-eye x-show="!show" class="h-5 w-5 text-gray-500" />
        <x-heroicon-o-eye-slash x-show="show" class="h-5 w-5 text-gray-500" />
    </label>
</div>
    </div>
    <div class="w-full">
        @error($name)
        <span class="text-red-600">{{$message}}</span>
        @enderror
       </div>
</div>
