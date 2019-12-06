# HasOne

La relación `hasOne()`, nos permitirá vincular un modelo que depende únicamente de otro. Imaginemos dos modelos: `User` y `Profile`, ahora utilicemos el código habitual de **Laravel** para indicar que el modelo `User` tiene un modelo `Profile`, es decir, en el modelo `User`, añadiremos el siguiente código:

```php
public function profile() 
{
    return $this->hasOne(\App\Profile::class);
}
```

Ahora, en nuestro recurso: `\App\Belich\Resources\User.php`, podremos añadir un campo de formulario para relación uno a uno:

```php
HasOne::make('Profile avatar', 'Profile', '\App\Profile', 'profile_avatar')
    ->rules('required'),
```

La estructura del campo, será:

```php
HasOne::make(string $label, string $relationshipClass, ?string $relationshipModel = null, ?string $relationshipModelColumn = null),
```

- `$label`: Es la etiqueta del campo.
- `$relationshipClass`: Es el recurso del modelo relacional. Siguiendo nuestro ejemplo: `\App\Belich\Resources\Profile.php`.
- `$relationshipModel`: Es el modelo vinculado (en nuestro ejemplo: `\App\Profile`). Este campo no es obligatorio, ya que puede obtenerse del recurso a través de la variable `$model`. Si se deja en blanco, **Belich**, automáticamente lo buscará.
- `$relationshipModelColumn` es la columna de la tabla relacional (en nuestro ejemplo: `profiles`), que queremos mostrar en la relación. Podemos dejarla en blanco, e iniciarla desde en el recurso `User`, de la siguiente forma:

```php
// /** @var string */
public static $column = 'profile_avatar';
```

?>Podemos indicar la columna de la base de datos de dos formas: como la última variable del método `make()` o como variable estática `$column`. **Este campo, nos permite indicar la columna de la relación cuyo valor queremos mostrar. No podemos dejarlo en blanco.**

### Vistas **index** y **show**

Por defecto, este es un campo informativo, es decir, solo se mostrará en las vistas: `index` y `show`. 

En estas vistas, nos encontraremos un enlace, con el valor del campo, y apuntando la vista `show` del modelo relacional:

```html
// \App\Belich\Resources\User.php

<a href="/dashboard/profiles/1" class="show-link"> https://lorempixel.com/200/200/people/?82133</a>
```

### Vistas **create** y **edit**

¿Qué pasa si queremos crear o modificar campos de la tabla `profiles`, desde el formulario de `users`?

**Belich**, nos permite hacerlo. Para ello, debemos indicar que los campos son editables, y por tanto, que pueden aparecer en las vistas: `create` y `edit`. Lo haremos añadiendo el método: `editable()`:

```php
HasOne::make('Profile avatar', 'Profile', '\App\Profile', 'profile_avatar')
    ->rules('required')
    ->editable(),
```

En la vista `create`, nos aparecerá un campo de texto asignado a la columna del modelo relacionado, es decir, usando los ejemplos anteriores, sería el campo `profile_avatar` de la tabla `profiles`.

Al crear el nuevo usuario, creará un perfil para este nuevo usuario, con los valores relacionales que indiquemos, por ejemplo:

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
        HasOne::make('Profile avatar', 'Profile', '\App\Profile', 'profile_avatar')
            ->editable()
            ->rules('required'),
        HasOne::make('Profile address', 'Profile', '\App\Profile', 'profile_address')
            ->rules('required')
            ->editable(),
    ];
}
```

Nos creará un campo de perfil, con los siguientes parámetros:

```php
[
    'id' => 1, //Autoincrement...
    'user_id' => 1, //Our auth()->user()->id
    'profile_avatar' => 'https://lorempixel.com/200/200/people/?82133',
    'profile_address' => '9469 Etha Roads',
]
```

?>Al campo relacional `HasOne`, podemos añadirle cualquier regla de validación que queramos.

### Mostrando datos relacionales

Si nos vamos a la vista `edit`, vamos a encontranos con que nos mostrará un campo `select`, con todos los valores de `indexQuery()` del recurso `Profile`:

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

En este caso, sólo podríamos ver nuestro perfil. Pero ¿qué pasa si queremos personalizar la consulta a la base de datos, ignorando la predeterminada en el recurso?. *Belich*, dispone de un método para personalizar esta consulta:

```php
HasOne::make('Profile address', 'Profile', '\App\Profile')
    ->rules('required')
    ->editable()
    ->query(function($query) {
        return $query
            ->where('user_id', auth()->user()->id)
            ->pluck(static::$column, static::$column)
            ->toArray();
    }),
```

!> Recordemos que debemos devolver el resultado como **array**. 

?> Respecto a las columnas devueltas en el array, debemos devolver sólo la **columna** relational: `pluck(static::$column, static::$column)`, si devolvemos la columna **id**: `pluck(static::$column, 'id')` este campo, será el que se almacene en la base de datos... y por lo general no querremos esta situación.

Podemos encontrarnos, con la situación que la consulta devuelva demasiados valores para un campo `select`. Para ello, disponemos de la opción de mostrar el resultado como un `datalist`, mediante el método `searchable()`:

```php
HasOne::make('Profile address', 'Profile', '\App\Profile')
    ->rules('required')
    ->editable()
    ->searchable(),
```

Pudiendo buscar entre el array de datos disponibles.
