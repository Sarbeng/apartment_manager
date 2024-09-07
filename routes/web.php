<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',Login::class);
Route::get('register',Register::class);

Route::get('dashboard',Dashboard::class)->middleware('auth');

//logout Route
Route::get('logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');

})->middleware('auth');