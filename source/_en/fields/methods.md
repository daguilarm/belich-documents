---
title: Generic methods supported 
description: Management of generic methods for form fields
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Generic methods supported

In this section, we will see the generic methods supported by **Belich**. These methods can be used in most of the form fields (although there are always exceptions).

The generic methods currently supported are:

- `asHtml()`
- `addClass()`
- `autocompleteOff()`
- `autocompleteOn()`
- `autofocus()`
- `data()`
- `defaultValue()`
- `disabled()`
- `displayUsing()`
- `dusk()`
- `help()`
- `info()`
- `id()`
- `name()`
- `pattern()`
- `placeholder()`
- `prefix()`
- `readonly()`
- `resolveUsing()`
- `sortable()`
- `suffix()`
- `textAlign()`

Let's see a complete example:

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
            ->addClass('text-blue', 'font-bold')
            ->data('url', 'http://url.com')
            ->defaultValue('email@email.com')
            ->disable()
            ->dusk('dusk-email')
            ->help('Enter a valid email')
            ->info('Important info')
            ->id('email_id')
            ->name('email_name')
            ->placeholder('my email')
            ->pattern('[a-z]{1,15}')
            ->readonly()
            ->autocompleteOff()
    ]
}
```

Should show:

```html
<label>Email</label>
    <input type="text" class="text-blue font-bold" data-url="http://url.com value="email@email.com" disabled="disabled" dusk="dusk-email" id="email_id" name="email_name" placeholder="my email" pattern="[a-z]{1,15}" autocomplete="off" readonly/>
<div class="help">Enter a valid email</div>
```

>**Important**: The `help()` and `info()` fields allow the direct use of `html`, so we could do something like this:

```php
Text::make('Email', 'email')
    ->help('<h1>Use a valid email!</h1>, more info: <a href="http://info.net">more info</a>'),
```

Finally, we would lack the methods: `asHtml()` and `sortable()`. 

The first one, allows us to return the results to the views: `index` and `show`as a `HTML`: without escaping, and therefore, executed as `HTML` code.

The second method (`sortable()`), tells us that in the view `index`, the column of the table corresponding to this field can be ordered from highest to lowest or vice versa.

The methods: `sortable()`, `readonly()` and `disabled()`, support Boolean values, that is, we can add conditions to be displayed. Of course, if the value is not Boolean, it will give error.

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
            ->readonly(auth()->user()->isAdmin())
    ]
}
```

We also have a method called: `displayUsing()`, which will allow us to format the value of our field (in the views: `index` and `show`), making a callback and allowing us to manipulate the value of the field. 

This method would be used as follows:

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
            ->displayUsing(function($value) {
                return strtolower($value);
            })
    ]
}
```

Returning the result in lowercase, allowing us to format the result of the field. **In other words, we can access the value of the field and manipulate it**. If what we want is to access to the model, we must use the method: `resolveUsing()`. 

The syntax is identical to `displayUsing()`:

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
            ->resolveUsing(function($model) {
                return $model->relationship->item;
            })
    ]
}
```

The methods `suffix()` and `prefix()`, will allow us to add a prefix or suffix to the value of the field. For example, if the field shows us an amount money, and we want to add the dollar symbol:

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
            ->suffix('$')
    ]
}
```

Will returns:

```
1298.55$
```

the methods `suffix()` and `prefix()`, support a second value. This field is a Boolean that allows us to indicate if we want a blank space before the suffix or after the prefix.

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
            ->suffix('$', $space = true)
    ]
}
```

Will returns:

```
1298.55 $
```

>Remember that the methods: `displayUsing()`, `suffix()` and `prefix()` only affect the views: `index` and `show`. The rest of the views are not affected by these methods, and will show them without modifications.

>The method `resolveUsing()`, not seen in form views, only seen in views: `index` and `show`.

There is also a method to align the internal content of a form field. To do this, we will use the method `textAlign()`. The supported values are: `left`, `center`,`right` and `justify`. This method, what it does is add an alignment class to the field:

```php
$field->textAlign('left');
```

Will be shown:

```html
<input class="text-left">
```

Actually, it is an alias of the `addClass()` method, so we would get the same like this:

```php
$field->addClass('text-left');
```
