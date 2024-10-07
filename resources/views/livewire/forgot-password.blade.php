<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    Forgot Password
    
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
        </div>
    
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <button class="btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    
    
</div>
