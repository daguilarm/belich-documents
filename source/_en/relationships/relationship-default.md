---
title: Relational Fields
description: Managing relational fields
extends: _layouts.documentation
section: content
locate: en
folder: relationships
---

# Relational Fields

**Belich** has an automatic system for managing relationships between models, using the form fields.

As an example:

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
        ID::make('Id'),
        Text::make('User', 'name')
            ->rules('required'),
        Text::make('Email', 'email')
            ->rules('required', 'email'),
        HasOne::make('Profile avatar', 'Profile')
            ->rules('required'),
    ];
}
```

The fields supported by **Belich**, are:

- `HasOne()`
- `BelongsTo()`
- `HasMany()`
- `BelongsToMany()`

>To avoid duplicate queries and use the `Eager Loading` of Laravel, we must to add the variable: `$relationships` to our resource.

Let's see an example:

```php
<?php

namespace App\Belich\Resources;

use Daguilarm\Belich\Core\Resources;
use Daguilarm\Belich\Fields\Types\ID;
use Daguilarm\Belich\Fields\Types\Password;
use Daguilarm\Belich\Fields\Types\Relationships\HasOne;
use Daguilarm\Belich\Fields\Types\Text;
use Illuminate\Http\Request;

class Users extends Resources {

    /** @var string [Model path] */
    public static $model = '\App\User';

    /** @var array */
    public static $relationships = ['image', 'profile'];

    /** @var string */
    public static $label = 'User';

    /** @var string */
    public static $pluralLabel = 'Users';

    // /** @var string */
    public static $column = 'user_name';

    /**
     * Build the query for the given resource.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function indexQuery() {
        return $this->model();
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Collection
     */
    public function fields(Request $request): array
    {
        return [
            ID::make('Id'),
            Text::make('User', 'name')
                ->rules('required'),
            Text::make('Email', 'email')
                ->rules('required', 'email'),
            Password::make('Password', 'password')
                ->rules('required'),
            HasOne::make('Avatar image', 'Image', 'img_avatar')
                ->rules('required'),
            HasOne::make('Profile address', 'Profile')
                ->rules('required')
                ->searchable()
                ->query(function($query) {
                    return $query
                        ->where('user_id', '>', 10)
                        ->pluck(static::$column, static::$column)
                        ->toArray();
                }),
        ];
    }

    /**
     * Set the custom metric cards
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Collection
     */
    public static function metrics(Request $request): array
    {
        return [];
    }

    /**
     * Set the custom cards
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Collection
     */
    public static function cards(Request $request): array
    {
        return [];
    }
}
```

So, if we have several relational fields, we must add all the relationships to the variable `$relationships`:

```php
/** @var array */
public static $relationships = ['image', 'profile', 'user'];
```
