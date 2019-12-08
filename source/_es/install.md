---
title: Instalar Belich 
description: Instalación del panel de administración Belich
extends: _layouts.documentation
section: content
locate: es
---

# Instalar Belich 

### Instalar mediante composer

```php
composer require daguilarm/belich
```

### Crear migraciones 

```php
php artisan migrate
```

### Crear los seeders 

Por defecto, **Belich** supone que cada usuario debe de tener un perfil con información adicional (como el avatar), aunque todo esto puede suprimirse si se desea (más información en el apartado *Configuración de la aplicación* que podrá encontrar aqui: [Configuración](config)).

Si desea crear los seeders para las bases de datos: `users` y `profiles`, deberá ir a `.\database\seeds` y crear el archivo:

- `UsersTableSeeder.php`

Una vez creado, añádalo al archivo `DatabaseSeeder.php`. A modo de ejemplo, este podría ser su archivo:

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

Ahora, hay que crear el archivo `factory`, para ello, vamos a `\database\factories` y creamos los archivos `ProfileFactory.php` y `UserFactory.php`. A modo de ejemplo, sus archivos podría ser así:

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

### Actualizar las rutas.

Por defecto, el acceso a la autentificación de usuario se encuentra en `domain.com/dashboard/login`

Podemos cambiarlo según nuestras necesidades, definiendo la ruta del directorio, en nuestro archivo `config\belich.php`, modificando la variable:

```php
//This is the URI path where application will be accessible from
'path' => '/dashboard',
```

Y posteriormente, podemos definir nuestra ruta personalizada, desde el archivo `routes\web.php`, utilizando el siguiente código (para que por defecto nos redirija a la página de autentificación):

```php
Route::get('/', function () {
    return redirect()->route('login');
});
```

>Por defecto, **Belich** asigna la ruta `login` para su acceso identificado, esto puede llegar a generar un conflicto, por lo que puede modificarlo (reescribiéndo el campo name de la ruta) desde el archivo `\app\Belich\Routes.php`

A modo de ejemplo:

```php
Route::get(Belich::path() . '/login', 'Daguilarm\Belich\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('myproject.login');
```

### Publicar componentes 

```php
php artisan vendor:publish --provider="Daguilarm\Belich\ServiceProvider"
```

### Limpiar vistas y cache 

```php
php artisan view:clear && php artisan cache:clear
```

### Actualizar composer

```php
composer dump-autoload
``` 
