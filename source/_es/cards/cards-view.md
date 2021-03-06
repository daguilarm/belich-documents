---
title: Vistas de tarjetas (Cards)
description: Gestionando Vistas de tarjetas
extends: _layouts.documentation
section: content
locate: es
folder: cards
---

# Cards: Vistas

Una vez que hemos asignado la ubicación de la *Vista* en el *Controlador*, podremos proceder como si de cualquier otra vista se tratara. Para ello, **Belich** ofrece un *Componente para Blade*, que nos ayudará a mantener el formato predeterminado. 

>Por supuesto, podemos no utilizar el componente, y utilizar la vista directamente.

Veamos la estructura del componente para **Cards** que tiene por defecto **Belich**. Algo tan simple como esto:

```php
<div id="cards-{{ $card->uriKey }}" class="{{ $card->width }} p-8 overflow-hidden shadow bg-{{ $background ?? 'white' }} border border-gray-200">
    {{ $content }}
</div>
```

Por lo que en nuestra vista, tendremos que hacer algo como así:

```php
//Direct version using Blade components
@component('belich::components.card')
    @slot('card', $card)
    @slot('content')
        <h1>Lorem</h1>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    @endslot
@endcomponent
```

**Belich** soporta [BladeX](https://github.com/spatie/laravel-blade-x), por lo que si adaptamos el ejemplo anterior:

```php
//Same example using BladeX (https://github.com/spatie/laravel-blade-x)
<belich::card :card="$card">
    <slot name="content">
        <h1>Lorem</h1>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </slot>
</belich::card>
```

>Ambas opciones son perfectamente válidas.

Por supuesto, podemos acceder a las variables que hemos enviado desde el *Controlador* (en el ejemplo mostrado en el capítulo sobre [Controladores](cards-controller), las variables que enviábamos era: `$data1` y `$data2`). 

Usando **Blade-X**:

```php
<belich::card :card="$card">
    <slot name="content">
        <h1>{{ $card->withMeta['data1'] }}</h1>
        <div>{{ $card->withMeta['data2'] }}</div>
    </slot>
</belich::card>
```

Usando **Blade Components**:

```php
@component('belich::components.card')
    @slot('card', $card)
    @slot('content')
        <h1>{{ $card->withMeta['data1'] }}</h1>
        <div>{{ $card->withMeta['data2'] }}</div>
    </slot>
    @endslot
@endcomponent
```
