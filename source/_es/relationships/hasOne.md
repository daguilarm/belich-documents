---
title: Campo relacional HasOne
description: Gestionando campos relacionales HasOne en Belich
extends: _layouts.documentation
section: content
locate: es
folder: relationships
---

# HasOne

La relación `hasOne()`, nos permitirá vincular un modelo que depende únicamente de otro. Es el equivalente a una relación *uno a uno* de **Laravel**.

Imaginemos dos modelos: `User` y `Profile`, ahora utilicemos el código habitual de **Laravel** para indicar que el modelo `User` tiene una relación con el modelo `Profile`:

```php
//app\User.php

public function profile() 
{
    return $this->hasOne(\App\Profile::class);
}
```

Ahora, en nuestro recurso: `\App\Belich\Resources\User.php`, podremos añadir un campo de formulario para relación uno a uno:

```php
HasOne::make('Profile avatar', 'Profile', 'profile_avatar')
    ->rules('required'),
```

La estructura del campo, será:

```php
HasOne::make(string $label, string $relationshipClass, ?string $relationshipModelColumn = null),
```

- `$label`: Es la etiqueta del campo.
- `$relationshipClass`: Es el recurso del modelo relacional. Siguiendo nuestro ejemplo: `\App\Belich\Resources\Profile.php`.
- `$relationshipModelColumn` es la columna de la tabla relacional (en nuestro ejemplo: `profiles`), que queremos mostrar en la relación. Podemos dejarla en blanco, e iniciarla desde en el recurso `User`, de la siguiente forma:

```php
// /** @var string */
public static $column = 'profile_avatar';
```

>Podemos indicar la columna de la base de datos relacional de dos formas: como la última variable del método `HasOne::make()` o como variable estática `$column`. **Este campo, nos permite indicar la columna de la relación cuyo valor queremos mostrar. No podemos dejarlo en blanco.**

### Vistas **index** y **show**

Por defecto, este es un campo informativo, es decir, solo se mostrará en las vistas: `index` y `show`. 

En estas vistas, nos encontraremos un enlace con el valor del campo, y apuntando la vista `show` del modelo relacional:

```html
// \App\Belich\Resources\User.php

<a href="/dashboard/profiles/1" class="show-link"> https://lorempixel.com/200/200/people/?82133</a>
```

### Vistas **create** y **edit**

####a) Vista **create**

En la vista `create`, nos aparecerá un campo de texto asignado a la columna del modelo relacionado, es decir, usando los ejemplos anteriores, sería el campo `profile_avatar` de la tabla `profiles`.

Al crear el nuevo usuario, creará un perfil para este nuevo usuario (de forma automática), con los valores relacionales que indiquemos:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        ID::make('Id'),
        Text::make('User', 'name')
            ->rules('required'),
        Text::make('Email', 'email')
            ->rules('required', 'email'),
        HasOne::make('Profile avatar', 'Profile', 'profile_avatar')
            ->rules('required'),
        HasOne::make('Profile address', 'Profile', 'profile_address')
            ->rules('required'),
    ];
}
```

Nos creará un fila en la base de datos de perfiles, con los siguientes parámetros:

```php
[
    'id' => 1, //Autoincrement...
    'user_id' => 1, //Our auth()->user()->id
    'profile_avatar' => 'https://lorempixel.com/200/200/people/?82133',//Por ejemplo
    'profile_address' => '9469 Etha Roads',//Por ejemplo
]
```

>Al campo relacional `HasOne`, podemos añadirle cualquier regla de validación que queramos.

####b) Vista **edit**

Si nos vamos a la vista `edit`, vamos a encontranos con que nos mostrará un campo `Select`, con todos los valores de `indexQuery()` del recurso `Profile`:

```php
// \App\Belich\Resources\Profile.php

/**
 * Build the query for the given resource.
 *
 * @return Illuminate\Database\Eloquent\Collection
 */
public function indexQuery() {
    return $this->model()
        ->where('id', request()->user()->id);
}
```

Si nos fijamos bien, en este ejemplo, sólo podríamos ver nuestro perfil. Pero **¿qué pasa si queremos personalizar la consulta a la base de datos, ignorando la consulta predeterminada en el recurso relacional?**. **Belich**, dispone de un método para personalizar esta consulta:

```php
HasOne::make('Profile address', 'Profile')
    ->rules('required')
    ->query(function($query) {
        return $query
            ->where('user_id', auth()->user()->id)
            ->pluck(static::$column, static::$column)
            ->toArray();
    }),
```

> Recordemos que debemos devolver el resultado como **array**. 

> Respecto a las columnas devueltas en el array, debemos devolver sólo la **columna** relational: `pluck(static::$column, static::$column)`, si devolvemos la columna **id**: `pluck(static::$column, 'id')` este campo, será el que se almacene en la base de datos... y por lo general no queremos esta situación, ¿o si?...

Podemos encontrarnos, con la situación que la consulta devuelva demasiados valores para un campo `Select`. Para ello, disponemos de la opción de mostrar el resultado como un `datalist`, mediante el método `searchable()`:

```php
HasOne::make('Profile address', 'Profile')
    ->rules('required')
    ->searchable(),
```

Pudiendo hacer una busqueda entre los datos disponibles en el campo, como si fuera una campo autocompletado.
