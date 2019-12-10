---
title: Custom fields
description: Custom Field Management
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Custom fields

**Belich**, allows you to create fully customized fields, apart from those included by default. The idea is to be able to create fields that adapt perfectly to our needs.

This functionality allows us to define the operation of our field in the four supported views:

- `index` 
- `create` 
- `edit` 
- `show` 

To create a custom field, we can do it using `artisan`:

`php artisan belich:component ClassName`

Automatically, the following folders and files will be created:

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

Let's start with the base file: `ClassName.php`, that acts as a controller:

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

In this file, we can handle all the views, and of course, it will allow us to send any data we need.

> By default, the views receive the variables `$field` and `$data`, which correspond to the field and its value, so we can access any attribute of the field, and its corresponding model.

### Customizing the views

The `create` and `edit` views have two default templates, the normal one and the one based on [Blade X](https://github.com/spatie/laravel-blade-x){.link-out}. So we can use either:

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

And the `index` and `show` views, have the following template:

```html
// Your custom component for the index view
// Remember, you have access to the variables: $data and $field
{{ $data->{$field->attribute} }}
```

> We can modify and adapt each file to our needs.

### Using our custom field

Its operation is identical to the rest of the fields:

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

Our custom field requires three variables:

- The label `label`, linked to our field.
- The column of the database.
- The custom class. Yes, it must be included, the idea of adding `magical` methods to obtain it...

### Applicable Methods

Custom fields inherit the same methods as the rest of the fields, so we can use all available methods, especially visibility ones:

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
