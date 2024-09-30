<?php

use App\Models\User;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Laravel\Socialite\Facades\Socialite;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Livewire\Reviewer\Dashboard as ReviewerDashboard;
use App\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;
use App\Livewire\VerifyEmail;

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

})->middleware('auth');

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
    // Route::get('login',Login::class);
});

/**
 * All reviewer routes go here
 */
Route::group(['middleware' => ['auth','verified', 'role:reviewer']], function () {
    Route::get('reviewer_dashboard', ReviewerDashboard::class)->name('reviewer.dashboard');
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

// Route::get('test', function () {


// Mail::raw('This is a test email!', function ($message) {
//     $message->to('ksarbengbaafi@gmail.com')
//             ->subject('Test Email from Laravel');
// });

// });

// resending the verification email
Route::post('/email/verification-notification', [Register::class,'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');