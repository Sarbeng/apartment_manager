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





