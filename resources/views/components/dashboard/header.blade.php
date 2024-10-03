<header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
    <div class="flex items-center">
        <!-- Sidebar Toggle for Mobile -->
        <button @click="open = !open" class="lg:hidden text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <h1 class="text-xl font-bold text-gray-800 ml-4">Dashboard</h1>
    </div>

    <!-- Profile Menu -->
    <!-- Profile Menu -->
    <div class="flex items-center space-x-4">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <!-- Button to open the dropdown -->
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center focus:outline-none">
                <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full object-cover" alt="User">
                <span class="ml-2 text-gray-700 hidden lg:block">John Doe</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div 
                x-show="dropdownOpen" 
                @click.away="dropdownOpen = false" 
                class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg py-2"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
            >
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</header>
