<div class="flex justify-center items-center h-fit bg-white lg:w-96  rounded shadow">
    <form class="py-8 lg:w-72" wire:submit="save"> 
        @if (session()->has('error'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative" role="alert">
                {{ session('error') }}
            </div>
        @endif
       <x-application-logo logoText="UCC-IRB"/>
        <x-input wire:model="email" name="email" type="text" label="Email" class="w-full" />
        {{-- <x-input wire:model="password" name="password" type="password" label="Password" class="w-full" /> --}}
        <x-password-input wire:model="password" name="password" />
        <x-button class="w-full" type="submit">
            Login
        </x-button>
    </form>
</div>
