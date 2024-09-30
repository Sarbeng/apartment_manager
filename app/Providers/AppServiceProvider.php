<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Livewire\Forms\Input;
use App\Livewire\Forms\Button;
use App\Livewire\Forms\PasswordInput;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //so this works but i realized that i didnt actually need it so i had to let it go
        // Livewire::component('input', Input::class);
        // Livewire::component('button', Button::class);
        // Livewire::component('password-input', PasswordInput::class);

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }
}
