@props(['class','routes'])
<div class="flex gap-1 justify-center text-sm font-light {{$class}}" {{$attributes}}>
    <h4>Dont have an account? </h4> <span><a href="{{ route($routes) }}" class="text-blue-700">Sign Up</a></span>
</div>
