---
title: Tabs
description: Management of form fields using tabs or tabs
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Tabs

**Belich** incorporates the option to group the fields into tabs. The operation is identical to [Panels](panels). The only difference is to activate the `$tabs` variable, as follows:

```php
/** 
 * @var bool
 */
public static $tabs = true;
```

So the code of the resource would look like this:

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

Showing the following:

![Tabs](../../../assets/images/fields/tabs.png){.mx-auto}
<div id="legend"><b>fig 3</b>: Fields grouped by tabs</div>

>The `Tabs` fields are displayed in all views except in the `index`

The `Tabs` fields are really `Panels` fields, with the only different that the `Header` field, that is used as the title, has been removed.

In fact, the `Tabs` class does not inherit from the `Field` class, like most of the fields, it does from the `Panels` class.

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
