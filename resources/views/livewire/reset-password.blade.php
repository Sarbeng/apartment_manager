<x-layouts.app>
    
    <div class="max-w-md bg-white shadow p-8">
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        {{-- Forgot Password --}}
        <x-application-logo logoText="Reset Password"/>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
            </div>
        
           <!-- Validation Errors -->
        @if ($errors->any())
        <div class="mt-4 bg-red-100 text-red-600 p-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
            <form
             {{-- wire:submit="resetPassword"  --}}
              action="{{ route('password.update') }}"
             method="POST" 
              >
                @csrf
         <!-- Hidden token input -->
         <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <x-input label="email" name="email" class="" type="text"/>
                    <x-password-input  name="password" class="" label="password" toggle_password="toggle_password"/>
                    <x-password-input  name="password_confirmation" class="" label="confirm password" toggle_password="toggle"/>
                </div>
        
               
                <x-button class="bg-blue-700 hover:bg-blue-900" type="submit" >
                    Reset Password
                </x-button>
            </form>
        
        
    </div>
    
</x-layouts.app>