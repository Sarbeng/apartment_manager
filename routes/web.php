<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',Login::class)->name('login');
Route::get('register',Register::class);

//Route::get('dashboard',Dashboard::class)->middleware('auth');

//Route::get('admin/dashboard', AdminDashboard::class);

//logout Route
Route::get('logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');

})->middleware('auth');

/**
 * User Protected Routes
 */
// Route::group(['middleware' => ['auth','user'], 'prefix' => 'user'], function () {
//     //Route::resource('applications');
//     Route::get('dashboard2',Dashboard::class);
// });

/**
 * Admin Protected Routes
 */
// Route::group(['middleware' => ['auth','admin'], ], function () {
//     //Route::resource('applications');
//     Route::get('dashboard',AdminDashboard::class)->name('admin.dashboard');
// });

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin',AdminDashboard::class);
   // Route::get('login',Login::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('dashboard',Dashboard::class);
   // Route::get('login',Login::class);
});
