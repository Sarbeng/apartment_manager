@props(['name','label','type','class'])
<div class="mb-3 w-full">
    <!-- Be present above all else. - Naval Ravikant -->
    <label class="text-sm mb-2 capitalize">{{$label}}</label>
    <input name="{{$name}}" class="border h-10 w-full px-2 rounded  {{$class}}" type="{{$type}}" {{$attributes}} />
   <div class="w-full">
    @error($name)
    <span class="text-red-600">{{$message}}</span>
    @enderror
   </div>
</div>