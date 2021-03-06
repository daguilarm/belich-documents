---
title: Autorización de campos de formulario
description: Gestión de campos de formulario para autorización
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Autorización de campos de formulario

Belich permite añadir autorización a los diferentes campos, a través del método `canSee()`.

La sintaxis será: 

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Email', 'email')
            ->canSee(function($request) {
                return true;
            })
    ]
}
```

A través de la variable `$request`, podremos acceder al usuario: 

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Email', 'email')
            ->canSee(function($request) {
                return $request->user()->isAdmin();
            })
    ]
}
```

Lo cual nos permitirá, mostrar u ocultar el campo en función de roles, permisos, etc...
