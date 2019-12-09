---
title: Authorization of form fields
description: Management of form fields for authorization
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Authorization of form fields

Belich allows to add authorization to the different fields, through the method `canSee()`.

The syntax will be: 

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

Through the variable `$request`, we can access to the user: 

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

Which will allow us to show or hide the field based on roles, permissions, etc ...
