---
title: Pattern fields
description: Management of pattern-based methods
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Pattern fields

**Belich** has types of fields, such as: `Number` or `Date` that use the `html5` standards to work, therefore, the behavior will depend on each browser, and how it interprets its operation .

But what if we want to use a `Date` field according to a pattern that interests us? That is, instead of showing us a calendar, what we want for the field is to only allow numbers and have this format:

        dd/mm/YYYY

To do this, pattern-based fields are used, so that we can define these behaviors.

Let's look at the previous example, but with code:

```php
use Daguilarm\Belich\Fields\Types\Pattern;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Pattern::make('Current date', 'date')
            ->mask('99/99/9999'),
    ];
}
```

Simply, we have to use the `mask()` method to determine the behavior pattern of the field. All this is based on the code of [vanilla-masker](https://github.com/vanilla-masker/vanilla-masker){.link-out}. 

Here is a summary of its operation:

- `9`: to indicate that the field must be a number.
- `A`: to indicate that the field must be alphabetic.
- `S`: to indicate an alphanumeric field.

A few examples:

```php
//Número de teléfono
$value  = '1099911111'; 
$mask   = '(99) 9999-9999';
$result = '(10) 9991-1111';

//D.N.I.
$value  = '123456789K'; 
$mask   = '999999999-A';
$result = '123456789-K';

//Número de serie
$value  = '1A34M6790A'; 
$mask   = 'SS-SS-SSSS-SS';
$result = '1A-34-M679-0A';
```

By default, the field is defined as `string`, so the `toString()` method is added in the constructor directly. More information on supported types: [Casts](casts)

For example, if our field must be numeric and admit only two decimals:

```php
use Daguilarm\Belich\Fields\Types\Pattern;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Pattern::make('Current date', 'date')
            ->mask('99999.99')
            ->toFloat(),
    ];
}
```

Fields based on patterns work similarly to the rest of the fields, so they inherit the same methods as the rest. More information about the generic methods that support: [Generic methods](methods)
