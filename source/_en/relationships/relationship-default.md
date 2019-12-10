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
            ->editable()
            ->rules('required'),
    ];
}
```

The fields supported by **Belich**, are:

- `HasOne()`
- `BelongsTo()`
- `HasMany()`
- `BelongsToMany()`
