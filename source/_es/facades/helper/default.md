# Helper Facade

Belich, dispone de una serie de helpers que pueden ser utilizados en cualquier parte del package de forma directa, mediante la la Facade: `Helper`. 

A continuación, puedrá consultar la lista de métodos soportados por `Helper`, y que, tal vez, puedan ser de utilidad al desarrollador:

#### icon()

Genera un icono con texto (si aplica). La sintaxis es la siguiente:

~~~
Helper::icon(string $icon, $text = '', $css = '')
~~~

Por lo que puede usarse así:

~~~
{!! Helper::icon($icon='trash', $text='new icon', $css='text-red') !!}

//will render 
<i class="fas fa-trash mr-2 text-red"></i> new icon
~~~

Al añadir texto, automáticamente añade un margen derecho de 2 (`mr-2`).

#### actionIcon()

Exactamente igual que antes, pero sin texto. Esta pensado para los botones de acción de la tabla del `index`.

~~~
{!! Helper::actionIcon($icon='trash') !!}

//will render 
<i class="fas fa-trash"></i>
~~~

#### belich_path()

Genera la ruta completa a un archivo, en base la configuración de Belich. Para ello, utiliza el siguiente método:

~~~
/**
 * Built belich urls
 *
 * @param string|null $resource
 *
 * @return string
 */
private function belich_path(?string $resource = null): string
{
    return sprintf(
        '%s%s/%s',
        config('belich.url'),
        config('belich.path'),
        $resource
    );
}
~~~

#### emptyResults()

Devuelve un `string` con el valor por defecto para cuando no hay resultados, esta valor es: `—`.

~~~
HTML: &mdash;
Unicode: U+2014
MacOs: ⌥ + ⇧ + -
Windows: Alt + 0151
~~~

#### gravatar()

Para generar un avatar a través de la api de [Gravatar](https://gravatar.com/site/implement/images/php/).

~~~
/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string|null $email The email address
 * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 *
 * @source https://gravatar.com/site/implement/images/php/
 *
 * @return  string
 */
private function gravatar(?string $email = null, int $size = 80, string $imageSet = 'mp', string $rating = 'g'): string
{
    $email = $email
        ? md5(strtolower(trim($email)))
        : auth()->user()->email;

    return sprintf($this->gravatarUrl, $email, $size, $imageSet, $rating);
}
~~~

#### hasMetrics()

Nos sirve para configurar nuestro componente y determinar si el recurso ha generado gráficas, y por tanto, podemos ser capaces de incluirlas. Hay que incluir el `Request`, ya sea desde la variable `$request` o desde el helper: `request()`, ya que es en él, donde se evalua si hay gráficas o no.


~~~
Helper::hasMetrics($request)
~~~

También podemos utilizar el componente para `Blade`, que es un contenedor para el helper: 

~~~
@hasMetrics($request)
~~~

#### hasMetricsLegends()

Igual que el anterior, nos indica si la gráfica tiene una leyenda (y por tanto, poder mostrala) o no.

#### hasSoftdelete()

Nos sirve para determinar si un modelo, tiene activado el `softDelete`, y por tanto, poder evaluarlo.

~~~
Helper::hasSoftdelete($model)
~~~

También tiene su equivalente para `Blade`: 

~~~
@hasSoftdelete($model)
~~~

#### hideContainerForScreens(array [])

Este helper nos ayudará a crear las clases `CSS` necesarias para que un contenedor esté oculto o visible en función del tamaño de la pantalla.

Por ejemplo:

~~~
<div class="{{ Helper::hideContainerForScreens(['sm', 'md']) }}"></div>

//Will result 
<div class="hidden lg:block xl:block"></div>
~~~

Este helper no está pensado para usarse directamente, sino como herramienta para los helpers: `hideCardsForScreens()` y `hideMetricsForScreens()`, que realizan la operación anterior, pero utilizando los valores que hemos configurado en el archivo `./config/belich.php`

#### hideCardsForScreens()

Descrito anteriormente:

~~~
<div class="{{ Helper::hideCardsForScreens() }}"></div>
~~~

#### hideMetricsForScreens()

Descrito anteriormente:

~~~
<div class="{{ Helper::hideMetricsForScreens() }}"></div>
~~~

#### namespace_path()

Genera el namespace completo para un archivo.

~~~
/**
 * Get the package namespace path
 *
 * @param string $file
 *
 * @return string
 */
private function namespace_path(string $file): string
{
    return '\\Daguilarm\\Belich\\' . $file;
}
~~~

#### stringPluralLower

Nos permite formatear `strings`: en este caso devuelve el plural (sólo en ingles) en minúculas:

~~~
Helper::stringPluralLower('HOUSE');

// Will return: houses
~~~

#### stringPluralUpper

Igual que el anterior. En este caso devuelve el plural (sólo en ingles) en mayúsculas:

~~~
Helper::stringPluralUpper('house');

// Will return: HOUSES
~~~

#### stringSingularUpper

Igual que el anterior. En este caso devuelve el singular (sólo en ingles) en mayúsculas:

~~~
Helper::stringSingularUpper('HOUSES');

// Will return: house
~~~

#### stringTokebab

Es un alias de `Illuminate\Support\Str::kebab($string)`;

~~~
Helper::stringTokebab('hello world');

// Will return: hello-world
~~~

#### toRoute()

Utilizado en los formularios de las vistas `edit` y `create`, para generar rápidamente las urls (a partir de rutas) del campo `action`.

El ejemplo utilizado por la vista create:

~~~
<form method="POST" action="{{ Helper::toRoute('store') }}">
~~~

En el caso de la vista `edit`, sería:

~~~
<form method="POST" action="{{ Helper::toRoute('update') }}">
~~~

Obteniendo automáticamente el identificador del recurso (ID), y generando la url a partir de él.

#### route_path()

Genera la ruta parcial a un archivo, en base la configuración de Belich.

~~~
/**
 * Get the resource path
 *
 * @param string $file
 *
 * @return string
 */
private function route_path(string $file): string
{
    return sprintf('%s/%s', config('belich.path'), $file);
}
