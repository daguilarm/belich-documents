---
title: Tabs / Tabuladores
description: Gestión de campos de formulario mediante tabs o tabuladores
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Tabs / Tabuladores

**Belich** incorpora la opción de agrupar los campos en tabs. El funcionamiento, es idéntico al de los [Paneles](panels). La única diferencia, es la de activar la variable `$tabs`, de la siguiente forma:

```php
/** 
 * @var bool
 */
public static $tabs = true;
```

Por lo que el código del recurso, quedaría así:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\ID;
use Daguilarm\Belich\Fields\Types\Select;
use Daguilarm\Belich\Fields\Types\Tabs;
use Daguilarm\Belich\Fields\Types\Text;
use Daguilarm\Belich\Fields\Types\TextArea;

/** @var bool */
public static $tabs = true;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Tabs::create('Billing Info', function() {
            return [
                ID::make('Id'),
                Text::make('Billing name', 'billing_name')
                    ->sortable()
                    ->rules('required'),
                Boolean::make('Status', 'billing_status')
                    ->sortable(),
                Text::make('N.I.F.', 'billing_nif')
                    ->sortable()
                    ->rules('required'),
            ];
        }),
        Tabs::create('Personal info', function() {
            return [
                Text::make('Telephone', 'billing_telephone')
                    ->sortable()
                    ->rules('required'),
                Text::make('Address', 'billing_address')
                    ->sortable()
                    ->rules('required'),
                TextArea::make('Telephone2', 'billing_telephone')
                    ->count(200)
                    ->rules('required')
                    ->addClass('testing-class')
            ];
        }),
    ];
}
```

Obteniendo:

![Tabs](../../../assets/images/fields/tabs.webp){.mx-auto}
<div id="legend"><b>fig 3</b>: Campos agrupados por tabs</div>

>Los campos `Tabs` se visualizan en todas las vistas salvo en el `index`

Los campos `Tabs`, son realmente campos `Panels`, a los que se les ha quitado el campo `Header` que se utiliza como título. 

De hecho, la clase `Tabs`, no hereda de la clase `Field`, como la mayoría de campos, lo hace de la clase `Panels`.

```php
namespace Daguilarm\Belich\Fields\Types;

use Daguilarm\Belich\Fields\Types\Panels;
use Illuminate\Support\Collection;

final class Tabs extends Panels
{
    /**
     * Create a new panel
     *
     * @param  string  $name
     * @param  \Closure  $fields
     *
     * @return array
     */
    public static function create(string $name, callable $fields, ?string $background = null, ?string $color = null): array
    {
        // Get all the fields
        $fields = static::getFields($fields);

        return static::setFields($name, $fields);
    }
}
```
