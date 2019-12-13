---
title: Controladores de tarjetas (Card Controllers)
description: Gestionando Controladores de tarjetas
extends: _layouts.documentation
section: content
locate: es
folder: cards
---

# Cards: Controladores

El controlador, se puede generar mediante consola: 

```php
artisan belich:card CardName
```

Será guardado en la carpeta: `\App\Belich\Cards`, y tendrá la siguiente estructura:

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

Este archivo, que actuará como *Controlador*, nos permitirá guardar toda la lógica de la `Card`, y por tanto, la vista estará libre de código `PHP`.

A través del método `view()`, definimos la ubicación de la vista. Por tanto, podemos ubicar la vista donde queramos, aunque por defecto, la ubicación para las vistas de las **Cards** es:

~~~
./resources/views/vendor/belich/cards/
~~~

Allí, encontraremos un archivo de ejemplo llamado: `example.blade.php`, que nos servirá como plantilla para crear nuestra vista.

También disponemos del método `withMeta()` que nos permitirá devolver un array con variables que será inyectado directamente a la vista, y por tanto, accesible desde ella.

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

Al igual que sucedía con las [Gráficas](/es/metrics/metrics.md), disponemos del método `uriKey()` que nos permitirá identificar con una clave única nuestra `Card`.

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
