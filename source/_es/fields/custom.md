# Campos personalizados

**Belich**, permite crear campos totalmente personalizados, a parte de los que incluye por defecto, de forma que podamos crear campos que se adapten perfectamente a nuestras necesidades.

Esta funcionalidad, nos permitirá definir el funcionamiento de nuestro campo, en las cuatro vistas:

- `index` 
- `create` 
- `edit` 
- `show` 

Para crear un campo personalizado, debemos hacerlo mediante artisan:

`php artisan belich:component ClassName `

Automáticamente, se creará las siguientes carpetas y archivos:

```html
├App
    ├Belich
        ├Components
            ├ClassName
                ├ClassName.php
                ├resources 
                    ├views 
                        ├create.blade.php 
                        ├edit.blade.php
                        ├index.blade.php
                        ├show.blade.php
```

Empecemos por el archivo base: `ClassName.php`, que actua como controlador:

```php
<?php

namespace App\Belich\Components\ClassName;

use Daguilarm\Belich\Contracts\CrudContract;
use Daguilarm\Belich\Fields\Types\CustomField;

class ClassName extends CustomField implements CrudContract
{
    /**
     * Resolve value for index
     *
     * @param  object $field
     * @param  object $data
     *
     * @return string|null
     */
    public function index(object $field, ?object $data = null): ?string
    {
        return view()->exists('index')
            ? view('index', compact('field', 'data'))
            : null;
    }

    /**
     * Resolve value for create
     *
     * @param  object $data
     *
     * @return string|null
     */
    public function create(object $field, ?object $data = null): ?string
    {
        return view()->exists('create')
            ? view('create', compact('field', 'data'))
            : null;
    }

    /**
     * Resolve value for edit
     *
     * @param  object $data
     *
     * @return string|null
     */
    public function edit(object $field, ?object $data = null): ?string
    {
        return view()->exists('edit')
            ? view('edit', compact('field', 'data'))
            : null;
    }

    /**
     * Resolve value for show
     *
     * @param  object $field
     * @param  object|null $data
     *
     * @return object
     */
    public function show(object $field, ?object $data = null): ?string
    {
        return view()->exists('show')
            ? view('show', compact('field', 'data'))
            : null;
    }
}

```

En el que se definen las vistas de cada acción de nuestro campo, y por supuesto, nos permitirá enviar a la vista cualquier variable que necesitemos.

?> Por defecto, las vistas reciben las variables `$field` y `$data`, que corresponden al campo y a su valor, es decir, podemos acceder a cualquier atributo del campo, y al modelo correspondiente a este.

### Personalizando las vistas

Las vistas `create` y `edit`, disponen de dos plantillas por defecto, la normal y la basada en `Blade X`.

```html
{{-- Vanilla example for input[type=text] --}}
<div class="form-item-field w-full flex items-center py-8 px-6 bg-white text-gray-600 border-b border-gray-200 text-sm shadow-md">
    <div class="w-1/3">
        <label class="capitalize font-bold">{{ $field->label }}</label>
    </div>
    <div class="w-2/3 my-auto">
        <input class="mr-3" type="text" dusk="{{ $field->dusk }}" id="{{ $field->id }}" name="{{ $field->name }}">
        <p id="error-{{ $field->id }}" class="validation-error text-red-500 font-normal italic mt-2"></p>
    </div>
</div>

{{-- BladeX example for input[type=text] --}}
<belich::fields :field="$field">
    <slot name="input">
        <input
            {!! Helper::formAttribute($field, 'addClass', 'mr-3') !!}
            {!! Helper::formAttribute($field, 'type', 'text') !!}
            {!! $field->render !!}
        >
    </slot>
</belich::fields>
```

Y las vistas `index` y `show`, disponen de la siguiente plantilla:

```html
// Your custom component for the index view
// Remember, you have access to the variables: $data and $field
{{ $data->{$field->attribute} }}
```

?> Podemos modificar y adaptar cada archivo a nuestras necesidades.

### Utilización de nuestro campo personalizado 

Su funcionamiento, es idéntico al del resto de campos:

```php 
use \App\Belich\Components\MyField\MyField;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        ClassName::make('Field label', 'table_column', ClassName::class),
    ];
}
```

Nuestro campo personalizado, requiere de tres variables:

- La etiqueta `label`, vinculada a nuestro campo.
- La columna de la base de datos, con la que vincularlo.
- La clase personalizada. Si, hay que incluirla, la idea de añadir métodos `mágicos` para obtenerla, puede dar problemas...

### Métodos aplicables 

Los campos personalizados, heredan los mismos métodos que el resto de campos, por lo que podemos utilizar todos los métodos disponibles, especialmente, los de visibilidad:

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
        ClassName::make('Hide from index', 'test_name', ClassName::class)
            ->hideFromIndex(),
        ClassName::make('Hide from show', 'test_name', ClassName::class)
            ->hideFromShow(),
        ClassName::make('Hide when creating', 'test_name', ClassName::class)
            ->hideWhenCreating(),
    ];
}
```
