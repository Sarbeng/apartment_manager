<div class="mb-4">
    <label for="{{$model}}" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
    <input type="text" wire:model="{{$model}}" id="{{$model}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring @error('{{$model}}') border-red-500 @enderror">
   
</div>