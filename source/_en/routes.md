---
title: Routes
description: Managing routes with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Routes

The system automatically generates the routes: `index`, ` show`, `create`, ` restore`, `forceDelete`, ` update` and `delete` of each resource found in the directory `App\Belich\Resources`.

You can also add custom routes from the file `App\Belich\Routes.php`. This file is generated automatically when installing **Belich**, and has the following default settings:

```php
/*
|--------------------------------------------------------------------------
| Define your coustom routes
|--------------------------------------------------------------------------
*/

/** Belich Routes */
Route::group([
        'as' => Belich::pathName() . '.',
        'middleware' => Belich::middleware(),
    ], function () {

        //Dashboard route
        Route::get(Belich::path(), function() {
            return view('belich::pages.dashboard');
        })->name('dashboard');

        //Maybe, you can create your own controller or view and start the magic!
});
```

So we can add our custom routes here.
