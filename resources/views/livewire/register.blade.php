<div class="flex justify-center items-center h-fit bg-white w-9/12  rounded shadow">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form class="py-8 px-8 w-full" wire:submit="save">
        <x-error-alert />
        <x-application-logo logoText="UCC-IRB Registration" />
        <div class="grid grid-cols-2 grid-flow-row gap-4">
            <x-input wire:model="firstname" name="firstname" type="text" label="First Name" class="w-full"
                placeholder="Enter your firstname" />
            <x-input wire:model="lastname" name="lastname" type="text" label="lastname" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-input wire:model="email" name="email" type="text" label="Email" class="w-full"
                placeholder="Enter your email" />
            <x-button class="bg-blue-700 hover:bg-blue-900 w-full px-24 mt-6" type="submit">
                Register
            </x-button>
        </div>

    </form>
</div>
