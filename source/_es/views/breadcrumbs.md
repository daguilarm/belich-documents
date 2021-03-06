---
title: Breadcrumbs
description: Gestionando Breadcrumbs
extends: _layouts.documentation
section: content
locate: es
folder: views
---

# Breadcrumbs

Los *breadcrumbs* pueden ser configurados desde la vista situada en `resources/views/vendor/belich/partials/navigation/breadcrumbs.blade.php`. 

El template básico tiene el siguiente formato:

```php
{{-- Customize your breadcrumbs --}}
<nav class="w-full rounded-lg rounded-b-none shadow bg-white">
    <ul class="flex list-reset my-3 p-4 font-semibold">
        @foreach($request->breadcrumbs as $label => $url)
            {{-- Links --}}
            @if($label && $url)
                <li>
                    <a href="{{ $url }}" class="text-teal-dark font-medium underline">{{ $label }}</a>
                </li>

            {{-- Current --}}
            @else
                <li class="text-grey-darker">{{ $label }}</li>
            @endif

            {{-- Set separator --}}
            @if(!$loop->last)
                <li class="mx-2">/</li>
            @endif
        @endforeach
    </ul>
</nav>
```

### Crear un breadcrumb personalizado para un recurso

Simplemente debemos abrir el archivo del recurso (por ejemplo: *User*), ubicado en: `\App\Belich\Resources\User.php`, y en él, se podrá añadir un método para personalizar el *breadcrumb*. 

A modo de ejemplo:

```php
/**
 * Set the breadcrumbs for the given resource.
 *
 * @return array
 */
public static function breadcrumbs()
{
    return [
        'text1' => 'http://url1.com',
        'text2' => 'http://url2.com',
        'text3',
    ];
}
```

El ejemplo anterior, mostrá un *breadcrumb* con los textos y enlaces indicados. 

Si se fija, el último elemento del array no tiene *url*, eso es debido a que es la página actual... en cualquier caso, es libre de poner una *url* si lo desea, pero: **¿Tiene sentido poner un enlace a la página actual?**
