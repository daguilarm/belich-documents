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
            ->editable()
            ->rules('required'),
    ];
}
```

Los campos soportados por **Belich**, son:

- `HasOne()`
- `BelongsTo()`
- `HasMany()`
- `BelongsToMany()`
