---
title: Access Authorization
description: Managing access authorization with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Access Authorization

**Belich** use the Laravel authorization system, through `Policies`. 

Generate the `Police` and register it in `\App\Providers\AuthServiceProvider`, the easiest way is with `artisan`:

```php
php artisan belich:policy PolicyName
```

You can find more information at: [Comandos de consola](commands).

By default, the system will search for the `Police` to authorize the resources you add. Therefore, if the `Police` has not been generated, you will not be able to access the resource, and an error 403 will be triggered.

>Remember to create and register your `Police` or you will not be able to access your resource.

The methods natively supported by **Belich** are:

- create
- delete
- file
- forceDelete
- restore
- update
- view
- viewAny
- withTrashed

Some of these methods do not support adding secondary models, therefore, you just have to indicate the current model on which the `Police` is registered. These methods are:

- create
- view
- viewAny
- withTrashed

Below is an example of a `Police`, indicating the methods that support secondary models and those that do not. 

The example would be for the user profiles of our project:

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
