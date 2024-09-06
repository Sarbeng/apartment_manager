@props(['logoText'])
<div class="flex flex-col justify-center items-center mb-8">
    <!-- Well begun is half done. - Aristotle -->
    <div class="w-24 h-24 bg-slate-100 flex justify-center items-center rounded-full p-4">
        <img src="{{ asset('images/ucc_logo.png')}}" class="w-12"/>
    </div>
    <h2 class="text-2xl text-center overflow-auto">{{$logoText}}</h2>
</div>