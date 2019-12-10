---
title: Methods to modify type declarations
description: Management of form fields to modify type declarations
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Methods to modify type declarations

**Belich** allows you to assign the type of a field before saving it to the database, and without using `accessors` or `mutators`.

The procedure is the next:

```php
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Status', 'status')
            ->toInteger(),
    ];
}
```

And the field will be converted to `integer` before being added to the database. Right after the validation, since this modification is made in the *Form Request* corresponding to the Controller's action.

The available types are:

- `toBoolean()`
- `toDate(string $format)`
- `toInteger()`
- `toFloat()`
- `toJson()`
- `toYear()`
- `toString()`

>Special mention to the `toDate()` method, which, as you can see, forces us to add the date format since it is necessary to create the `Carbon \ Carbon` object.
