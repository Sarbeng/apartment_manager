<form class="bg-white h-auto w-1/4  shadow-sm rounded p-4" wire:submit="save">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="">
        Login page
    </div>
    <livewire:forms.input wire:model='email' label='Email' type='email' />
    <livewire:forms.password-input wire:model='email' label='Password' type='password'/>
</form>
