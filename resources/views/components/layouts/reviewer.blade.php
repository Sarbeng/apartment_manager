<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Dashboard' }}</title>
    </head>
    <body class="h-screen bg-gray-100" x-data="{ open: false }">
        <div class="flex h-screen">
            <!-- Sidebar Component -->
            <x-dashboard.sidebar>
                {{-- sidebar links would go here --}}
                <x-dashboard.sidebar-links href="{{route('user.dashboard')}}" active="{{ request()->is('dashboard')}}" icon="heroicon-o-squares-2x2">
                    Dashboard
                </x-dashboard.sidebar-links>
                <x-dashboard.sidebar-links href="{{route('user.applications')}}" active="{{ request()->is('applications') }}" icon="heroicon-o-squares-plus">
                    My Applications
                 </x-dashboard.sidebar-links>
                <x-dashboard.sidebar-links href="{{route('user.new_applications')}}" active="{{ request()->is('new_applications') }}" icon="heroicon-o-squares-plus">
                   Create New Application
                </x-dashboard.sidebar-links>
                <x-dashboard.sidebar-links href="{{route('user.notifications')}}" active="{{ request()->is('notifications') }}" icon="heroicon-o-bell">
                   Notifications
                 </x-dashboard.sidebar-links>
                
            </x-dashboard.sidebar>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col">
                <!-- Header Component -->
                <x-dashboard.header />

                <!-- Main Dashboard Content -->
                <main class="p-6 bg-gray-100 flex-1">
                    {{ $slot }} <!-- This is where the page-specific content will go -->
                </main>
            </div>
        </div>

        @vite('resources/js/app.js')
    </body>
</html>
