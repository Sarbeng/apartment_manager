<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',Login::class);

Route::get('dashboard',Dashboard::class)->middleware('auth');