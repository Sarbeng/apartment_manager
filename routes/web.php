<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Reviewer\Dashboard as ReviewerDashboard;
use App\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;
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
 * All super admin routes go here
 */
Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('super_admin_dashboard',SuperAdminDashboard::class)->name('super_admin.dashboard');
   // Route::get('login',Login::class);
});

/**
 * All admin routes go here
 */
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin_dashboard',AdminDashboard::class)->name('admin.dashboard');
   // Route::get('login',Login::class);
});

/**
 * All user routes go here
 */
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('dashboard',Dashboard::class)->name('user.dashboard');
   // Route::get('login',Login::class);
});

/**
 * All reviewer routes go here
 */
Route::group(['middleware' => ['auth', 'role:reviewer']], function () {
    Route::get('reviewer_dashboard',ReviewerDashboard::class)->name('reviewer.dashboard');
   // Route::get('login',Login::class);
});
