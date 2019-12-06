# Tools \ Herramientas

**Belich** dispone de una serie de componentes (o herramientas) por defecto, que pueden ser utilizados tanto en la página principal: `resources\views\vendor\belich\dashboard.blade.php`, como en cualquier recurso, utilizándolos como `Cards`.

Nuestra página principal, ya incluye algunos componentes por defecto:

```php
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

Pero podemos utilizar estos complementos como si fueran `Cards`, he incluirlas en nuestros recursos. Para ello, debemos crear una nueva `Card` e incluirla en el recurso:

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

Y luego en la `Card` en cuestión, devolvemos la ruta de nuestra nueva vista, que debe estar en la carpeta: `Resources\Views\Cards`

```php
// resources\views\cards\calendar.blade.php

<belich::calendar id="tool-calendar" width="w-1/3"></belich::calendar>'
```

Los componentes por defecto, se encuentran en la ruta:

`resources\views\vendor\belich\components\tools`

Por el momento, se dispone de las siguientes herramientas:

- `Calendar`: nos muestra un calenario.
- `Model`: nos muestra una tabla con los resultados de un modelo, pudiendo configurar que campos aparecen y cuantos.
