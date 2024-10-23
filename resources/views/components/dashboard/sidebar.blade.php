<div :class="open ? 'block' : 'hidden lg:block'" class="w-64  bg-white shadow-sm text-slate-800 h-screen flex flex-col overflow-y-scroll">
    <div class="flex items-center justify-center p-4  mb-4">
        <h2 class=" text-lg md:text-2xl font-bold flex gap-2">  <img src="{{ asset('images/ucc_logo.png')}}" class="w-6 h-full  md:w-8 md:h-full"/> Admin Panel</h2>
    </div>
    <nav class="flex-1 px-4 space-y-2">
        {{-- sidebar links slot --}}
       
        {{$slot}}
    </nav>
</div>
