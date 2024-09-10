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




