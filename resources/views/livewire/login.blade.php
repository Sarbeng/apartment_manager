<div class="flex justify-center items-center h-fit bg-white lg:w-96  rounded shadow">
    <form class="py-8 lg:w-72" wire:submit="save"> 
       <x-error-alert />
       <x-application-logo logoText="UCC-IRB"/>
        <x-input wire:model="email" name="email" type="text" label="Email" class="w-full" placeholder="Enter your email" />
        {{-- <x-input wire:model="password" name="password" type="password" label="Password" class="w-full" /> --}}
        <x-password-input wire:model="password" name="password" />
        <x-button class="bg-blue-700 hover:bg-blue-900" type="submit">
            Login
        </x-button>
    </form>
</div>
