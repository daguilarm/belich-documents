---
title: Barra de navegación
description: Gestionando la Barra de navegación de Belich
extends: _layouts.documentation
section: content
locate: es
folder: views
---

# Barra de navegación

Automáticamente, **Belich** genera el archivo: `App\Belich\Navbar.php` este archivo, es el que generea el menú de navegación.

Por defecto, *Belich* configurará el menú, en base a los recursos añadidos a la carpeta: `App\Belich\Resources`.

Para agrupar los recursos, utilizaremos la variable `$group`, que deberemos añadir a nuestro recurso, de la siguiente forma:

```php
/** @var string [Model path] */
public static $model = '\App\Models\Billing';

/** @var bool */
public static $displayInNavigation = true;

/** @var string */
public static $group = 'Billing';

/** @var string */
public static $label = 'Invoice';

/** @var string */
public static $pluralLabel = 'Invoices';
```

En el ejemplo anterior, se muestra como sería la configuración de variables de un recurso.

Todos, los recursos que compartan la variable `$group`, estarán agrupados en el mismo menú desplegable.

Los menús de navegación pueden ser configurados desde la vista situada en `resources/views/vendor/belich/partials/navigation/navbar.blade.php`. 

El código por defecto utilizado por **Belich** es:

```php
{{-- This section is segregate in case you want to customize --}}
<nav id="navbar" class="h-16 {{ config('belich.navbar') === 'top' ? 'bg-teal-light' : 'bg-white' }}">
    {{-- Top navbar --}}
    <ul>
        {{-- Logo --}}
        <li class="bg-teal-dark">
            <a class="text-white w-48" href="{{ Belich::url() }}">{{ Belich::name() }}</a>
        </li>

        {{-- Top navbar --}}
        @if(config('belich.navbar') === 'top')
            {{-- Get all the resources --}}
            @foreach(Belich::getGroupResources() as $resource)

                {{-- One level resource --}}
                @if($resource->count() <= 1)
                    <li class="hover:bg-teal">
                        <a class="text-white" href="{{ sprintf('%s/%s', Belich::url(), $resource->first()->get('resource')) }}">
                            {{ $resource->first()->get('name') }}
                        </a>
                    </li>

                {{-- two level resource --}}
                @else
                    <li class="hover:bg-teal">
                        <a class="text-white" href="{{ sprintf('%s/%s', Belich::url(), $resource->first()->get('resource')) }}">
                            {{ $resource->first()->get('group') }}
                            <i class="fas fa-caret-down ml-1 icon"></i>
                        </a>
                        <ul>
                            @foreach($resource as $item)
                                <li class="bg-teal-light hover:bg-teal-lighter">
                                    <a class="text-white hover:text-teal-dark" href="{{ sprintf('%s/%s', Belich::url(), $item->get('resource')) }}">
                                        {{ $item->get('name') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        @endif

        {{-- Logout --}}
        <li class="float-right">
            @include('belich::partials.navigation.logout')
        </li>
    </ul>
</nav>
```

Siente libre de cambiarlo y configurarlo según tus necesidades.
