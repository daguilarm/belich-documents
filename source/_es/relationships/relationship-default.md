---
title: Campos relacionales
description: Gestionando campos relacionales en Belich
extends: _layouts.documentation
section: content
locate: es
folder: relationships
---

# Campos relacionales

**Belich** dispone de un sistema automático de gestión de relaciones entre modelos, utilizando campos de formulario. 

A modo de ejemplo:

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

Los campos soportados por **Belich**, son:

- `HasOne()`
- `BelongsTo()`
- `HasMany()`
- `BelongsToMany()`

>Para evitar consultas duplicadas y utilizar el `Eager Loading` de Laravel, debemos añadir la variable `$relationships` a nuestro recurso.

Veamos un ejemplo:

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

Es decir, si disponemos de varios campos relacionales, debemos añadir todas las relaciones a la variable `$relationships`:

```php
/** @var array */
public static $relationships = ['image', 'profile', 'user'];
```

Puedes incluso definir una *foreign key* personalizada, utilizando el método `foreignKey()`:

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
            ->foreignKey('custom_id')
            ->rules('required'),
    ];
}
```
