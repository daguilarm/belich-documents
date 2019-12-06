# Belich Facade: Rutas 

#### action()

Nos devolverá el último valor de la función `route`, es decir, la acción que se está producciendo en el Controlador del package. Devolverá cuatro estados por defecto:

`index`, `edit`, `create` y `show`.

#### actionRoute()

Nos genera un enlace directo para una acción, a partir de cualquiera de las cuatro acciones soportadas y identificador del recurso. El formato sería el siguiente:

```php
Belich::actionRoute($controllerAction, $data)
```

A modo de ejemplo:

```php
Belich::actionRoute('index')
```

Nos devolvería un enlace al index del recurso actual. El segundo parámetro `$data`, podemos pasarlo de dos formas:

- Como objeto, obteniendo el ID a partir de él.
- Como número entero, utilizando el ID directamente.

Por ejemplo:

```php
Belich::actionRoute('edit', $model)
Belich::actionRoute('edit', 201)
```

#### route()

Las rutas del package se generan automáticamente con el siguiente formato: `dashboard.resource.action`. Ahora imaginemos que nuestra ruta actual es `dashboard.users.index`. El método `route()` nos devolverá un array con los tres valores de la ruta:

```php
[
    'dashboard',
    'users',
    'index'
] 
```


