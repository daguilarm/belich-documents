---
title: Rutas
description: Gestionando rutas con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Rutas


El sistema, genera automáticamente las rutas: `index`, `show`, `create`, `restore`, `forceDelete`, `update` y `delete` de cada recurso que se encuentra en el directorio `App\Belich\Resources`.

También se pueden añadir rutas personalizadas, desde el archivo 
`App\Belich\Routes.php`. Este archivo, se genera de forma automática al instalar **Belich**, y tiene la siguiente configuración por defecto:

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

Por lo que podemos añadir nuestras rutas personalizadas aquí.
