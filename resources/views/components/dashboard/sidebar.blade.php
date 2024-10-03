<div :class="open ? 'block' : 'hidden lg:block'" class="w-64 bg-[#263875] text-white h-screen flex flex-col">
    <div class="flex items-center justify-center p-4">
        <h2 class="text-2xl font-bold flex gap-2">  <img src="{{ asset('images/ucc_logo.png')}}" class="w-8"/> Admin Panel</h2>
    </div>
    <nav class="flex-1 px-4 space-y-2">
        <a href="#" class="flex items-center p-2 rounded-md hover:bg-[#1f2f5a]">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12h18M3 12l6-6m-6 6l6 6"></path>
            </svg>
            Dashboard
        </a>
        <a href="#" class="flex items-center p-2 rounded-md hover:bg-[#1f2f5a]">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 4v16h16V4z"></path>
            </svg>
            Reports
        </a>
        <a href="#" class="flex items-center p-2 rounded-md hover:bg-[#1f2f5a]">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 4v16m8-8H4"></path>
            </svg>
            Settings
        </a>
    </nav>
</div>
