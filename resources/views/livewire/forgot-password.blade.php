<x-layouts.app>
    
    <div class="max-w-md bg-white shadow p-8">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        {{-- Forgot Password --}}
        <x-application-logo logoText="Forgot Password"/>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
            </div>
        
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
        
            <form
             {{-- wire:submit="forgotPassword"  --}}
             action="{{ route('password.email') }}"
             method="POST" 
              >
                @csrf
        
                <div>
                    <x-input wire:model="email" label="email" name="email" class="" type="text"/>
                </div>
        
               
                <x-button class="bg-blue-700 hover:bg-blue-900" type="submit" >
                    Email Reset Link
                </x-button>
            </form>
        
        
    </div>
    
</x-layouts.app>