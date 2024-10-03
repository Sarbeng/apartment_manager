<?php

namespace App\Providers;

use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Dashboard;
use Livewire\Livewire;
use App\Livewire\Forms\Input;
use App\Livewire\Forms\Button;
use App\Livewire\Forms\PasswordInput;
use App\Livewire\Reviewer\Dashboard as ReviewerDashboard;
use App\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;
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

        /**
         * Just calling my layouts because why else will it work otherwise?
         */
        Livewire::component('layouts.user',Dashboard::class);
        Livewire::component('layouts.admin',AdminDashboard::class);
        Livewire::component('layouts.reviewer',ReviewerDashboard::class);
        Livewire::component('layouts.super_admin',SuperAdminDashboard::class);

        /**
         * This is meant to send a mail to the user each time it is called
         */
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }
}
