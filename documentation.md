# IRB Project Documentation
## Author: Kwadwo Sarbeng-Baafi
I used livewire to create the app components
- I would first creat the component in the terminal
- which will create two files 
    - one in <p>app/livewire</p>
    - and another in <p>resources/livewire</p>
- the first file would be used to allow the component to perform certain actions
- while the first would just contain blade code mingled with a bit of livewire

I used Blade icons in this project
https://laravel-news.com/package/blade-ui-kit-blade-heroicons
https://blade-ui-kit.com/blade-icons?search=eye#search
and configured it using
<code>php artisan vendor:publish --tag=blade-heroicons-config</code>

The tables within my database were created using laravel
for example <p>php artisan make:migration create_users_table</p>

The file would be created within the <span class="bg-blue-950 text-white p-2">"database/migrations/" </span> folder.


### Frontend File structure
The files i used were split into regular blade template files and livewire files. 
The blade files were used to create components which can be found within <span class="bg-blue-950 text-white p-2">"resources/views/components/" </span> folder.
While the the livewire files are just having fun in the <span class="bg-blue-950 text-white p-2">"resources/views/livewire" </span> folder.
I created all the components to be used within the livewire files. If you require to edit any component you can do so and it will immediately affect all files that use said component, so be careful i suppose lol.

### Roles Structure
I created middleware to handle my roles authentication, so i can restrict what users can handle what. 
there are four users
- SuperAdmin
- Admin
- Reviewer
- User

### How to create and edit roles
All files for roles and permissions are found within
- The User Model : which is found in 'app/Models/User.php'
- The middleware which serves as a middleground linking our user model and our routes and views, 
  which is found at 'app/Http/Middleware/RoleMiddleware.php'. 
  The middleware checks to make sure that a user can't have access to pages that they are not authorized.

#### Creating/Editing a role
- First make sure that you update the role column of your user table to have the role that you want to add/edit
- You can edit it in the laravel migration or in MYSQL 
- in laravel you go create a new migration file <code>php artisan make:migration update_roles_column --table=users</code>
- In this file you have created you will write your update/alter code
- Next you will go to your User model and create another role function. eg
<code> 
    <!--  define a list of roles -->
    public const ROLE_USER = 'user';

    // creating an user function 
    public function isUser() 
    {
        return $this->role === self::ROLE_USER;
    }

</code>

- Next would be to create a route group in 'routes/web.php' which would contain all the various routes grouped by role
    - copy any of the route groups and paste it below the page and edit where appropriate, no need for drama. 
    - Hopefully the code would be commented for easy understanding and easy editing

## Google Authentication
### How to Setup/Edit Google Authentication. 
The video below contains a short and concise tutorial about how to go about this.
You can watch it to know how to setup and edit authentication.
<code>
https://www.youtube.com/watch?v=lWqJgqzN7cM
</code>

## Email Verification
This application inculcates email verification. Each time someone registers for an account, they would have an email sent to their account and from there they would then verify their account. Currently it works on localhost but in production, it would the domain and work with it, should be interesting right? 


### How To Add Email Verification to the Project?
#### Files to take note of
- "app/Models/User.php"
- "/resources/views/livewire/verify-email.blade.php"
- "/app/Providers/AppServiceProvider.php"
- "/app/Livewire/Register.php"
- "/routes/web.php" : In here we created a few routes to cater for the email verification
- The **.env** file
- the livewire documentation link: https://laravel.com/docs/11.x/verification#main-content
- tutotial link: https://medium.com/@akhmadshaleh/sending-email-with-laravel-10-and-gmail-49be01c2bc8f 
- video link https://www.youtube.com/watch?v=uFCYvRT0hy0 

## Before you begin sending emails to be verified.

### Create an App Password
An __App Password__ is a great way to create a password for an application so you can use it to send mails without using your actual email password. Saves you a lot of password stealing tbh. 
It is created by going to __Google Accounts__, searching for __App Password__ and then creating it. This password would then be put into your __.env__ file and would serve as your __MAIL_PASSWORD__

There are a number of files that have to be edited
### The .env file
in the .env file you'd have to edit your email details as below, edit the portions where appropriate

```
MAIL_MAILER=smtp 
MAIL_HOST=smtp.gmail.com 
MAIL_PORT=465 
MAIL_USERNAME="your_email@gmail.com" 
MAIL_PASSWORD="your_app_password" 
MAIL_ENCRYPTION=tls 
MAIL_FROM_ADDRESS="your_email@gmail.com" 
MAIL_FROM_NAME="${APP_NAME}"
```
### The User Model
in our user model we will add a few lines to enable us to send emails.
first we will change 
```
class User extends Authenticatable
``` 
to 
```
class User extends Authenticatable implements MustVerifyEmail
```

We will then import two elements
```
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
```

After which we will add `use Notifiable;` to the beginning of our User class


### The AppServiceProvider.php
Within this document we just need to add a few lines of code to enable our mail server, thankfully laravel comes inbuilt with most of these features we need to make our mails work well. In our __boot()__ function we would add the following code. Of course we can edit it how we want but the default works fine so why bother right?

```
     VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
```

### The web.php
These three lines of code do most of the heavy lifting for us when it comes to email verification in our `web.php`
```
    //email verification route
Route::get('/email/verify', [Register::class,'verifyNotice'])->middleware('auth')->name('verification.notice');
```

```
// email verification handler, when the user clicks on the link sent to their mail, 
// this thing here will do all the heavy lifting
Route::get('/email/verify/{id}/{hash}', [Register::class,'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
```

```
// resending the verification email
Route::post('/email/verification-notification', [Register::class,'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
```

### The Register.php
I know we said the `web.php` does most of the heavy lifting? Well thats not entirely true. The `/app/Livewire/Register.php` actually does the heavy lifting. Below are listed functions within our `Register.php` that go hand in hand with the routes in our `web.php` to allow us to handle email verification.


The first being the `verifyNotice()` function, which would just display our email verification page
```
    public function verifyNotice () {
        return view('livewire.verify-email');
    }
```

The `verifyEmail()` function is our email handler function, this function will verify our user for us and update our
```
    public function verifyEmail (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('user.dashboard');
    }
   ``` 

  The `verifyHandler` function will resend the verification email handler
   ```
    public function verifyHandler (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }
```

import the following to enable our functions to work well

```
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;
```

and add `event(new Registered($user));` just before our redirect in our `save()` function, this will trigger user verification for each new user who registers.


## Forgot Password & Reset Password
Users would periodically forget their password, as such we(I) worked on enabling said users to be able to retrieve their passwords if need be.

### Files to consider for forgot password & reset password
- '/resources/views/livewire/forgot-password.blade.php'
- '/resources/views/livewire/reset-password.blade.php'
- '/app/Livewire/ForgotPassword.php'
- '/app/Livewire/ResetPassword.php'
- '/routes/web.php'

### How to tackle Forgot Password
We'd have to tackle forgot password before we tackle password reset. 
For `Forgot Password` we first need our `Forgot Password Routes` , within `/routes/web.php`
where we will paste
``` 
 Route::get('/forgot-password', [ForgotPassword::class,'render'])->name('password.request');

 Route::post('/forgot-password',[ForgotPassword::class,'forgotPassword'])->name(name: 'password.email');

```

We didn't use controllers, rather we used livewire components to handle our classes and functions as you see in the code above. 

Next we'd go into our `/app/Livewire/ForgotPassword.php` and add functions to it like so :

```

    public $email;

    public function forgotPassword (Request $request) 
    {
        //validating our inputs
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
       // $this->validated();

        //
        $status = Password::sendResetLink(
            $request->only('email')
        );

        //
        return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);

        
    }

```

What this code essentially does is, when we go to the route named `password.email` on our `/resources/views/livewire/forgot-password.blade.php` view, it will take the inputed email and send them an email to reset their password. 
If successful it returns a nice status message to let us know that we did good, else it returns an error.

### Tackling Reset Password
After the individual clicks the link in their mail, they will be redirected to these routes

```

Route::get('/reset-password/{token}', [ResetPassword::class,'render'])->name('password.reset');
Route::post('/reset-password',[ResetPassword::class,'resetPassword'])->name('password.update');

```

specifically the `/reset-password/{token}` link. This link will take a token from the email to enable us to reset the persons password without requiring the person to enter all their details.

This page opened by this link will contain `email`,`password` and `confirm password` sections. The good thing about this page is that without the token, this page will never open. Securittyyyyy!!!!! Thats important.

The actual work is done when you submit your details to reset your password. Submitting goes to the route named `password.update`

```

public function resetPassword (Request $request) 
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

```

This code validates the inputs and makes sure the user submites the right information first.
Then it invokes the `Password` facade to help us to reset the users password. In simple terms. 

