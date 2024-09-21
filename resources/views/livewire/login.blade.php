<div class="flex justify-center items-center h-fit bg-white lg:w-96  rounded shadow">
    <form class="py-8 lg:w-72" wire:submit="save"> 
       <x-error-alert />
       <x-application-logo logoText="UCC-IRB Login"/>
        <x-input wire:model="email" name="email" type="text" label="Email" class="w-full" placeholder="" />
        {{-- <x-input wire:model="password" name="password" type="password" label="Password" class="w-full" /> --}}
        <x-password-input wire:model="password" name="password" class="" label="password" toggle_password="toggle-password"/>
        <x-button class="bg-blue-700 hover:bg-blue-900" type="submit">
            Login
        </x-button>
        <div class="">
            <div></div>
        </div>
       <x-divider/>
         <x-button wire:click="googleAuth" class="bg-red-600 hover:bg-red-700 " type="button">
        Login with Google
    </x-button>
    </form>
   
</div>
