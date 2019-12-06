# Autorización de acceso 

**Belich** utiliza el sistema de autorización de Laravel, mediante `Policies`. 

Genere la `Police` y regístrela en `\App\Providers\AuthServiceProvider`, para ello, la forma más rápida es mediante `artisan`:

```php
php artisan belich:policy PolicyName
```

Puede encontrar más información en: [Comandos de consola](/es/commands.md).

Por defecto, el sistema buscará la `Police` para autorizar los recursos que añada. Por tanto, si la `Police` no ha sido generada, no podrá acceder al recurso, y se disparará un error 403.

?>Recuerde crear y registar su `Police` o no podrá acceder a su recurso.

Los métodos soportados de forma nativa por Belich son:

- create
- delete
- file
- forceDelete
- restore
- update
- view
- viewAny
- withTrashed

Algunos de estos métodos, no soportan añadirles modelos secundarios, por tanto, solo hay que indicarles el modelo actual sobre el que está registrada la `Police`. Estos métodos son:

- create
- view
- viewAny
- withTrashed

A continuación, se muestra un ejemplo de una `Police`, indicando los métodos que soportan modelos secundarios y los que no. 

El ejemplo, sería para los perfiles de usuario de nuestro proyecto:

```php
<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
    * Determine whether the User can create the a Profile.
    *
    * @param  \App\Models\User  $user
    * @return mixed
    */
    public function create(User $user)
    {
        return true;
    }

    /**
    * Determine whether the User can delete a Profile.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Profile  $profile
    * @return mixed
    */
    public function delete(User $user, Profile $profile)
    {
        return true;
    }

    /**
    * Determine if the user can access or download files
    *
    * @param  \App\User  $user
    * @param  \App\Profile  $profile
    * @return mixed
    */
    public function file(User $user, Billing $billing)
    {
        return true;
    }
    
    /**
    * Determine whether the User can force delete a Profile.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Profile  $profile
    * @return mixed
    */
    public function forceDelete(User $user, Profile $profile)
    {
        return true;
    }

    /**
    * Determine whether the User can restore a Profile.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Profile  $profile
    * @return mixed
    */
    public function restore(User $user, Profile $profile)
    {
        return true;
    }

    /**
    * Determine whether the User can update a Profile.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Profile  $profile
    * @return mixed
    */
    public function update(User $user, Profile $profile)
    {
        return true;
    }

    /**
    * Determine whether the User can view a Profile.
    * This method will affect the controller 'show' action
    *
    * @param  \App\Models\User  $user
    * @return mixed
    */
    public function view(User $user)
    {
       return true;
    }

    /**
    * Determine whether the User can view a Profile.
    * This method will affect the controller 'index' action
    *
    * @param  \App\Models\User  $user
    * @return mixed
    */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
    * Determine whether the User can see the trashed Profiles.
    *
    * @param  \App\Models\User  $user
    * @return mixed
    */
    public function withTrashed(User $user)
    {
        return true;
    }
}
```
