@props(['name','label'])
<div class="pb-8">
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <input type="checkbox" name="{{$name}}" id="{{$name}}"  {{$attributes}} />
    <label for="{{$name}}" class="text-sm font-light">{{$label}}</label>
</div>