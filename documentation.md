# IRB Project Documentation

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
- "/resources/views/livewire/verify-email.blade.php"
- "/app/Providers/AppServiceProvider.php"
- "/app/Livewire/Register.php"
- "/routes/web.php" : In here we created a few routes to cater for the email verification
- The **.env** file
- the livewire documentation link: https://laravel.com/docs/11.x/verification#main-content

### Before you begin sending emails to be verified.

#### Create an App Password
An __App Password__ is a great way to create a password for an application so you can use it to send mails without using your actual email password. Saves you a lot of password stealing tbh. 
It is created by going to __Google Accounts__, searching for __App Password__ and then creating it. This password would then be put into your __.env__ file and would serve as your __MAIL_PASSWORD__

There are a number of files that have to be edited
#### The .env file
in the .env file you'd have to edit your email details as below, edit the portions where appropriate
<code>
<br>
MAIL_MAILER=smtp <br>
MAIL_HOST=smtp.gmail.com <br>
MAIL_PORT=465 <br>
MAIL_USERNAME="your_email@gmail.com" <br>
MAIL_PASSWORD="your_app_password" <br>
MAIL_ENCRYPTION=tls <br>
MAIL_FROM_ADDRESS="your_email@gmail.com" <br>
MAIL_FROM_NAME="${APP_NAME}"
</code>

#### The AppServiceProvider.php
Within this document we just need to add a few lines of code to enable our mail server, thankfully laravel comes inbuilt with most of these features we need to make our mails work well.

