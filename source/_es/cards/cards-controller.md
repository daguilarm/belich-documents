---
title: Card Controllers
description: Gestionando Controladores de tarjetas
extends: _layouts.documentation
section: content
locate: en
folder: cards
---

# Cards

Una **Card**, se puede generar mediante consola: 

```php
artisan belich:card CardName
```

Este comando, nos creará dos archivos: una *Vista* y un *Controlador*. 

El *Controlador*, se generará en la carpeta: `\App\Belich\Cards`, y tendrá la siguiente estructura:

```php
namespace App\Belich\Cards;

use Daguilarm\Belich\Components\Cards\Card;
use Illuminate\Http\Request;

class UserCard extends Card {
    /**
     *
     * @var string
     */
    public $width = 'w-full';

    /**
     * Initialize the card
     *
     * @return string
     */
    public function __construct(Request $request)
    {
        parent::__construct();
    }

    /**
     * Return the view
     *
     * @return string
     */
    public function view() : string
    {
        return 'belich::cards.users';
    }

    /**
     * Return the view data
     *
     * @return string
     */
    public function withMeta() : array
    {
        return [
            'data1' => 'Example 1',
            'data2' => 'Example 2',
        ];
    }

    /**
     * Get the URI key for the card
     *
     * @return string
     */
    public function uriKey() : string
    {
        return 'user-card';
    }
}
```

Este archivo, nos permitirá guardar toda la lógica de la `Card`, y por tanto, la *Vista* estará libre de código `Php`.

La vista, se ha guardado por defecto en:

~~~
./resources/views/vendor/belich/cards/
~~~

Aunque esto, puede cambiarse fácilmente desde el archivo `app\config\belich.php`.

## Métodos disponibles 

Cada archivo de **Cards**, dispone de una serie de métodos, los cuales describimos a continuación:

### view()

A través del método `view()`, definimos la ubicación de la vista. Por tanto, podemos ubicar la vista donde queramos.

```php
/**
 * Return the view
 *
 * @return string
 */
public function view() : string
{
    return 'belich::cards.users';//By default in /resources/views/vendor/belich/cards/users.blade.php
}
```

>Importante: debemos indicar la ruta correcta de nuestra Vista, sobre todo si modificamos el archivo de configuración (`app\config\belich.php`) y la ruta por defecto.

### withMeta()

También disponemos del método `withMeta()` que nos permitirá devolver un *array* con variables que será inyectado directamente a la vista, y por tanto, accesible desde ella.

```php
/**
 * Return the view data
 *
 * @return string
 */
public function withMeta() : array
{
    return [
        'data1' => 'Example 1',
        'data2' => 'Example 2',
    ];
}
```

En el ejemplo anterior, tendremos disponibles en nuestra vista, las variables: 

- `$data1`
- `$data2`

Dentro de la variable `$card->withMeta`:

```php 
[
  "data1" => "Example 1"
  "data2" => "Example 2"
]
```

### uriKey()

Al igual que sucedía con las [Gráficas](metrics/metrics-default), disponemos del método `uriKey()` que nos permitirá identificar con una clave única nuestra `Card`.

Y también disponemos de la opción de determinar el ancho de nuestra `Card`, podemos hacerlo de dos formas:

a) Utilizando la variable `$width` del controlador.

```php 
/**
 *
 * @var string
 */
public $width = 'w-full';
```

b) Cuando inicializamos la clase desde `App\Belich\Resource\MyResource.php`, podemos indicarlo, de la siguiente forma:

```php 
App\Belich\Resource\MyResource.php

/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request): array
{
    return [
        (new \App\Belich\Cards\MyCard($request))->width('w-1/3'),
    ];
}
```

### Importante

No elimine el *Constructor*:

```php 
/**
 * Initialize the card
 *
 * @return string
 */
public function __construct(Request $request)
{
    parent::__construct();
}
```

<div class="blockquote-alert">
    Importante: No elimine el <i>Constructor</i> de la clase o no funcionará nada...
</div>
