---
title: Field Visibility
description: Management of form fields in terms of visibility
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Field Visibility

Belich has a series of methods that will allow us to show or hide the fields according to our needs. These methods are generic, and apply to all types of field.

>**Belich** sometimes applies pre-determined viewing behaviors to each field. For example, the `TextArea :: make ()` fields are assigned only visualization in the views: `index`,` edit` and `create`, and meanwhile, hide the field in the view: `show`. Therefore, if we want to see it, we must activate it with the corresponding method (for example, `visibleOn('show')` or the method `showOnDetail()`). At other times, such as with the `Id::make()` field, the display mapping cannot be changed, and in this case, it can only be seen in the views: `index` and `show`, regardless of whether we add `visibleOn('create')`, it will still not be seen in the view `create`.

### Field visibility methods

The system supports the following methods:

- `hideFromIndex()`
- `hideFromShow()` alias `hideFromDetail()`
- `hideWhenCreating()`
- `hideWhenEditing()` alias `hideWhenUpdating()`
- `onlyOnIndex()`
- `onlyOnShow()` alias `onlyOnDetail()`
- `onlyOnForms()`
- `exceptOnForms()`
- `visibleOn()`
- `hideFrom()`
- `showOnIndex()`
- `showOnShow()` alias `showOnDetail()`
- `showOnCreating()`
- `showOnEditing()` alias `showOnUpdating()`

> Aliases can be used interchangeably, since the result is the same.

Let's see an example of use:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Usuarios', 'name')
            ->hideFromIndex(),
        Text::make('Facturas', 'bill')
            ->visibleOn('index', 'edit', 'show'),
    ]
}
```

The first `Text` field will be seen only in the view: `index`, while the second only will be displayed in the views: `index`, `edit` and `show`, hiding from the rest.

>Remember that the four supported views are: `index`, `edit`, `show` and `create`.

The `visibleOn()` and `hideFrom()` methods allow us to show or hide fields in a personalized way, the rest of the methods are aliases of these two.
