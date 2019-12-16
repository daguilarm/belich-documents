---
title: Herramientas (Tools)
description: Gestionando Herramientas (Tools) con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Herramientas (Tools)

**Belich** dispone de una serie de herramientas (tools) por defecto, que pueden ser utilizados tanto en la página principal: `resources\views\vendor\belich\dashboard.blade.php`, como en cualquier *Recurso*, utilizándolos como `Cards`.

Nuestra página principal, ya incluye algunos componentes por defecto:

```php
// resources\views\vendor\belich\dashboard.blade.php

@extends('belich::layout')

@section('content')
    <div class="flex flex-wrap my-8 mx-6 p-4 rounded bg-white {{ config('belich.navbar') === 'top' ? 'shadow-md' : '' }}">

        {{-- Calendar --}}
        <belich::calendar width="w-1/3"></belich::calendar>

        {{-- Model to table --}}
        <belich::model :columns="['id', 'name', 'email']" model="\App\User" width="w-2/3" limit="5" ></belich::model>

    </div>
@endsection
```

Pero podemos utilizar estos complementos como si fueran `Cards`, he incluirlas en nuestros *Recursos*. Para ello, debemos crear una nueva `Card` e incluirla en el *Recurso*:

```php
// app\Belich\Resources\User.php

/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request): array
{
    return [
        (new \App\Belich\Cards\CalendarCard($request)),
    ];
}
```

Creamos nuestra `Card`:

```php
// app\Belich\Resources\Cards\CalendarCard.php

/**
 * Return the view
 *
 * @return string
 */
public function view() : string
{
    return 'cards.calendar';
}
```

Y luego en la `Card` en cuestión, devolvemos la ruta de nuestra nueva vista. En el ejemplo anterior, nuestro componente se encuentra en la carpeta: `Resources\Views\Cards`

```php
// resources\views\cards\calendar.blade.php

<belich::calendar id="tool-calendar" width="w-1/3"></belich::calendar>'
```

Los componentes por defecto, se encuentran en la carpeta:

`resources\views\vendor\belich\components\tools`

Por el momento, se dispone de las siguientes herramientas:

![Default Tools](../../../assets/images/tools.webp){.mx-auto}
<div id="legend"><b>fig 1</b>: Componentes por defecto</div>

### Calendar

Nos muestra un calenario, que podemos mostrar en nuestras vistas de la siguiente forma:

```php
//Calendar
<belich::calendar id="tool-calendar" width="w-1/3"></belich::calendar>
```

Donde podemos configurar los campos: `id` y `width`.

### Model to table

Nos muestra una tabla con los resultados de un modelo, pudiendo configurar que campos que aparecen y su número.

```php
//Model to table
<belich::model id="tool-model" :columns="['id', 'name', 'email']" model="\App\User" width="w-2/3" limit="5" ></belich::model>
```

Donde podemos configurar los campos:

- **id**
- **columns**: Enviando un *array* con las columnas de la tabla que queremos mostrar.
- **model**: Indicando donde se encuentra nuestro *Modelo*, para poder instanciarlo.
- **width**: Donde indicamos el ancho del componente.
- **limit**: El número de resultados a mostrar en la tabla.
