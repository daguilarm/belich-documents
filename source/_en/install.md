---
title: Install Belich 
description: Belich administration panel installation
extends: _layouts.documentation
section: content
locate: en
---

# Install Belich 

### Install using composer

```php
composer require daguilarm/belich
```

### Create migrations

```php
php artisan migrate
```

### Create seeders

By default, **Belich** assumes that each user must have a profile with additional information (such as the avatar), in any case, all this can be suppressed if desired (more information in the section *Application settings* that can be found here: [Configuration](/en/config.md)).

If you want to create the seeders for the databases: `users` and` profiles`, you must go to `.\Database\seeds` and create the file:

- `UsersTableSeeder.php`

Once created, add it to the `DatabaseSeeder.php` file. As an example, this could be your file:

```php
\database\seeds\UsersTableSeeder.php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 100 users
        $users = factory(\App\User::class, 100)->create();
    }
}
```

Now, you have to create the file `factory`, to do this, we go to`\database\ factories` and create the files `ProfileFactory.php` and ` UserFactory.php`. As an example, your files could be like this:

```php
\database\seeds\UserFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => Str::random(10),
        'created_at'        => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
    ];
});

$factory->afterCreating(App\User::class, function ($user, $faker) {
    factory(\App\Profile::class)->create([
        'user_id' => $user->id
    ]);
});
```

```php
\database\seeds\ProfileFactory.php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'profile_nick'             => $faker->word(),
        'profile_avatar'           => $faker->imageUrl(200, 200, 'people') ,
        'profile_age'              => rand(18, 75),
        'profile_locale'           => $faker->locale,
    ];
});
```

### Update the routes.

By default, access to user authentication can be found in `domain.com/dashboard/login`

We can change it according to our needs, defining the directory path, in our `config\belich.php` file, modifying the variable:

```php
//This is the URI path where application will be accessible from
'path' => '/dashboard',
```

And later, we can define our custom routes, from the `routes\web.php` file, using the following code (so that by default it redirects us to the authentication page):

```php
Route::get('/', function () {
    return redirect()->route('login');
});
```

>By default, **Belich** assigns the `login` path for its identified access, this can lead to a conflict, so you can modify it (by rewriting the path name field) from the file: `\app\Belich\Routes.php`

As an example:

```php
Route::get(Belich::path() . '/login', 'Daguilarm\Belich\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('myproject.login');
```

### Publish components

```php
php artisan vendor:publish --provider="Daguilarm\Belich\ServiceProvider"
```

### Clear views and cache

```php
php artisan view:clear && php artisan cache:clear
```

### Update composer

```php
composer dump-autoload
``` 
