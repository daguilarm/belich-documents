---
title: Conditional Dependent Fields 
description: Management of dependent conditional form fields
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Conditional Dependent Fields

**Belich**, has conditional dependent fields. In other words, if a Boolean field is active (true or 1), it will show the dependent fields. If instead its value is false (false or 0), the fields will be hidden.

> The value `null` is considered false.

Let's see an example:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Boolean::make('Boolean', 'test_boolean'),
        Conditional::make(function() {
            return [
                Text::make('Boolean test', 'test_email')
                    ->sortable()
                    ->autocompleteOn()
                    ->rules('required'),
            ];
        })->dependsOn('test_boolean', true),
    ];
}
```

While the Boolean field: `Boolean test`, is off (with `false` or `0`), the field: `test_email` will be hidden.

It also works with the `Select` fields:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Select::make('Status', 'test_status')
            ->options(['0' => 'False', '1' => 'True']),
        Conditional::make(function() {
            return [
                Text::make('Status test', 'test_address')
                    ->rules('required'),
            ];
        })->dependsOn('test_status', true),
    ];
}
```

Of course, it also works with a `Text` field:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Text::make('Name', 'test_status'),
        Conditional::make(function() {
            return [
                Text::make('Surname', 'test_surname'),
            ];
        })->dependsOn('test_status', true),
    ];
}
```

The moment we write something and click on the `input` field (event:` blur`), the `test_surname` field will appear and vice versa.

The structure of a conditional field will therefore be the following:

```php
Conditional::make(callable $callback)
    ->dependsOn(string $parent, ?bool $value);
```

Indicating the *parent* field on which it depends (`$parent`) and the value it can take (`$value`);

>The `$value` field will accept the following values: true, false, 1, 0 and null.
