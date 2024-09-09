<div class="flex justify-center items-center h-screen overflow-y-scroll bg-white lg:w-4/12 w-full  rounded shadow">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form class="py-8 px-8 w-full " wire:submit="save"> 
        <x-error-alert />
        <x-application-logo logoText="UCC-IRB Registration" />
        <div class="grid md:grid-cols-1 grid-cols-1 grid-flow-row gap-2">
            {{-- <x-input wire:model="title" name="title" type="text" label="title" class="w-full"
                placeholder="" /> --}}
            <x-input wire:model.live="firstname" name="firstname" type="text" label="First Name" class="w-full"
                placeholder="" />
            <x-input wire:model.live="lastname" name="lastname" type="text" label="lastname" class="w-full"
                placeholder="" />
            <x-input wire:model="other_names" name="other_names" type="text" label="Other names" class="w-full"
                placeholder="" />
            <x-input wire:model.live="email" name="email" type="text" label="Email" class="w-full"
                placeholder="" />
                <x-password-input wire:model.blur="password" name="password" class="" label="password" toggle_password="toggle_password"/>
                <x-password-input wire:model.blur="password_confirmation" name="password_confirmation" class="" label="confirm password" toggle_password="toggle"/>
            {{-- <x-input wire:model="country_of_residence" name="country_of_residence" type="text" label="country of residence" class="w-full"
                placeholder="" /> --}}
            {{-- <x-input wire:model="nationality" name="nationality" type="text" label="nationality" class="w-full"
                placeholder="" /> --}}
            {{-- <x-input wire:model="research_field" name="research_field" type="text" label="research field" class="w-full"
                placeholder="" />
            <x-input wire:model="research_sub_field" name="research_sub_field" type="text" label="research sub field" class="w-full"
                placeholder="" /> --}}
            {{-- <x-input wire:model="alternative_email" name="alternative_email" type="text" label="Alternative Email" class="w-full"
                placeholder="" /> --}}
            {{-- <x-input wire:model="phone_number" name="phone_number" type="text" label="phone number" class="w-full"
                placeholder="" />
            <x-input wire:model="postal_address" name="postal_address" type="text" label="Postal address" class="w-full"
                placeholder="" />
            <x-input wire:model="affiliation" name="email" type="text" label="Affiliation" class="w-full"
                placeholder="" />
            <x-input wire:model="member_since" name="member_since" type="date" label="member since" class="w-full"
                placeholder="" /> --}}
            <x-button class="bg-blue-700 hover:bg-blue-900 w-full mt-6" type="submit">
                Register
            </x-button>
        </div>

    </form>
</div>
