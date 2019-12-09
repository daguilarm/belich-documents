---
title: Field validation
description: Managing form fields for validation
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Field validation

**Belich** has a number of methods that will allow us to add validation rules to the fields of our resources. These methods are generic, and apply to all field types.

The main method, to assign rules, is the method: `rules()`, with which we can indicate the validation rules of each field. Using for it, the same rules using by **Laravel**.

The methods supported are:

- `rules()`
- `creationRules()`
- `updateRules()`

As an example:

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
            ->rules('required', 'email'),
        Text::make('Edad', 'age')
            ->creationRules('required', 'numeric')
            ->updateRules('numeric'),
    ]
}
```

In the first case, when using the `rules()` method, we indicate that those rules are both for when we *create* and for when we *edit* a form.

While in the second case, we are defining different rules for when we *create* and for when we *edit*.

We can add custom rules, for example:

```php
use Illuminate\Validation\Rule;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Email', 'email')
            ->rules('required', 'email', Rule::unique('users')->ignore($request->user()->id)),
    ]
}
```
