<?php

use App\Models\User;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Livewire\VerifyEmail;
use App\Livewire\Applications;
use App\Livewire\Notifications;
use App\Livewire\ResetPassword;
use App\Livewire\ForgotPassword;
use App\Livewire\NewApplications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Livewire\Reviewer\ReviewAssignments;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Reviewer\Dashboard as ReviewerDashboard;
use App\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');

//Route::get('dashboard',Dashboard::class)->middleware('auth');

//Route::get('admin/dashboard', AdminDashboard::class);

//logout Route
Route::get('logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

})->middleware('auth')->name('logout');

/**
 * All super admin routes go here
 */
Route::group(['middleware' => ['auth','verified', 'role:super-admin']], function () {
    Route::get('super_admin_dashboard', SuperAdminDashboard::class)->name('super_admin.dashboard');
    // Route::get('login',Login::class);
});

/**
 * All admin routes go here
 */
Route::group(['middleware' => ['auth','verified', 'role:admin']], function () {
    Route::get('admin_dashboard', AdminDashboard::class)->name('admin.dashboard');
    // Route::get('login',Login::class);
});

/**
 * All user routes go here
 */
Route::group(['middleware' => ['auth','verified', 'role:user']], function () {
    Route::get('dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('applications',Applications::class)->name('user.applications');
    Route::get('new_applications',NewApplications::class)->name('user.new_applications');
    Route::get('notifications',Notifications::class)->name('user.notifications');
    // Route::get('login',Login::class);
});

/**
 * All reviewer routes go here
 */
Route::group(['middleware' => ['auth','verified', 'role:reviewer']], function () {
    Route::get('reviewer_dashboard', ReviewerDashboard::class)->name('reviewer.dashboard');
    Route::get('reviewer_assignments',ReviewAssignments::class)->name('reviewer.assignments');
    // Route::get('login',Login::class);
});


/**
 * This section handles google autentication for my application
 */
Route::get('auth/google/redirect', function (Request $request) {
    return Socialite::driver("google")->redirect();
})->name('googleAuth');

Route::get('auth/google/callback', function (Request $request) {

    //dd($request->all());
    //dd(Socialite::driver("google")->user());

    $googleUser = Socialite::driver("google")->user();
    //dd($googleUser->user['given_name'], $googleUser->user['family_name']);

    $user = User::updateOrCreate([
        'google_id' => $googleUser->id
    ], [
        'firstname' => $googleUser->user['given_name'],
        'lastname' => $googleUser->user['family_name'],
        'email' => $googleUser->email,
        'password' => Str::password(12),
    ]);

    Auth::login($user);

    return redirect(config("/") . "dashboard");

    //dd($user);



});

//email verification route
Route::get('/email/verify', [Register::class,'verifyNotice'])->middleware('auth')->name('verification.notice');

// email verification handler, when the user clicks on the link sent to their mail, 
// this thing here will do all the heavy lifting
Route::get('/email/verify/{id}/{hash}', [Register::class,'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');


// resending the verification email
Route::post('/email/verification-notification', [Register::class,'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/**
 * Forgot Password Routes
 */

 Route::get('/forgot-password', [ForgotPassword::class,'render'])->name('password.request');

 Route::post('/forgot-password',[ForgotPassword::class,'forgotPassword'])->name(name: 'password.email');

/**
 * Reset Password Routes
 *  */ 

 Route::get('/reset-password/{token}', [ResetPassword::class,'render'])->name('password.reset');
 Route::post('/reset-password',[ResetPassword::class,'resetPassword'])->name('password.update');
