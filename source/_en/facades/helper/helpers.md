---
title: Belich facade - Helpers
description: Managing facades of belich to run helpers
extends: _layouts.documentation
section: content
locate: en
folder: facades/helper
---

# Helper Facade

**Belich**, has a series of helpers that can be used anywhere in the *package* directly, through the `Helper` *Facade*. 

Next, you can consult the list of methods supported by the `Helper` facade:

#### icon()

Generate an icon with text (if applicable). The syntax is as follows:

```php
Helper::icon(string $icon, $text = '', $css = '')
```

<div class="alert info">Belich has two CSS classes to manage icons: icon and icon-light. The first adds an opacity of 50% to the icon, and the second an opacity of 65%.</div>

So it can be used like this:

```php
{!! Helper::icon($icon='trash', $text='new icon', $css='text-red') !!}

//will render 
<i class="fas fa-trash mr-2 text-red"></i> new icon
```

When adding text, it automatically adds a right margin of 2 (`mr-2`).

#### actionIcon()

Exactly as before, but without text. It is designed for the action buttons of the table in the `index` view.

```php
{!! Helper::actionIcon($icon='trash') !!}

//will render 
<i class="fas fa-trash"></i>
```

#### belich_path()

It generates the complete path to a file, based on the **Belich** configuration. To do this, we use the following method:

```php
/**
 * Built belich urls
 *
 * @param string|null $resource
 *
 * @return string
 */
private function belich_path(?string $resource = null): string
{
    return sprintf(
        '%s%s/%s',
        config('belich.url'),
        config('belich.path'),
        $resource
    );
}
```

#### emptyResults()

Returns a string with a default value (default value: `—`), in case there is no results.

```bash
HTML: &mdash;
Unicode: U+2014
MacOs: ⌥ + ⇧ + -
Windows: Alt + 0151
```

#### gravatar()

To generate an avatar through the api from [Gravatar](https://gravatar.com/site/implement/images/php/){.link-out}.

```php
/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string|null $email The email address
 * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 *
 * @source https://gravatar.com/site/implement/images/php/
 *
 * @return  string
 */
private function gravatar(?string $email = null, int $size = 80, string $imageSet = 'mp', string $rating = 'g'): string
{
    $email = $email
        ? md5(strtolower(trim($email)))
        : auth()->user()->email;

    return sprintf($this->gravatarUrl, $email, $size, $imageSet, $rating);
}
```

#### hasMetrics()

It helps us to determine if our component has metrics, and therefore, if we may be able to include them (boolean response).

```php
Helper::hasMetrics($request)
```

We can also use the component for `Blade`, which is a container for the helper: 

```php
@hasMetrics($request)
```

#### hasMetricsLegends()

Like the previous one, it indicates if the graph has a legend (and therefore, if we can show it) or not.

#### hasSoftdelete()

It helps us to determine if a model has `softDelete` activated, and therefore, to evaluate it.

```php
Helper::hasSoftdelete($model)
```

It also has its equivalent for `Blade`: 

```php
@hasSoftdelete($model)
```

#### hideContainerForScreens(array [])

This helper will supply us a way to create all the `CSS` classes necessaries to hide or show a container depending on screen size.

For example:

```html
<div class="{{ Helper::hideContainerForScreens(['sm', 'md']) }}"></div>

//Will result 
<div class="hidden lg:block xl:block"></div>
```

This helper is not intended to use directly, but as a tool for the helpers: `hideCardsForScreens()` and `hideMetricsForScreens()`, that was performed in the previous operation, but using the values that we will have configured in the file: `./config/belich.php`

#### hideCardsForScreens()

Previously described:

```html
<div class="{{ Helper::hideCardsForScreens() }}"></div>
```

#### hideMetricsForScreens()

Previously described:

```html
<div class="{{ Helper::hideMetricsForScreens() }}"></div>
```

#### namespace_path()

Generate the full namespace for a file.

```php
/**
 * Get the package namespace path
 *
 * @param string $file
 *
 * @return string
 */
private function namespace_path(string $file): string
{
    return '\\Daguilarm\\Belich\\' . $file;
}
```

#### stringPluralLower

It allows us to format strings: in this case it returns the plural (only in English) in lower case:

```php
Helper::stringPluralLower('HOUSE');

// Will return: houses
```

#### stringPluralUpper

The same as the previous. In this case it returns the plural (only in English) in capital letters:

```php
Helper::stringPluralUpper('house');

// Will return: HOUSES
```

#### stringSingularUpper

The same as the previous. In this case it returns the singular (only in English) in capital letters:

```php
Helper::stringSingularUpper('HOUSES');

// Will return: house
```

#### stringTokebab

Is an alias from `Illuminate\Support\Str::kebab($string)`;

```php
Helper::stringTokebab('hello world');

// Will return: hello-world
```

#### toRoute()

Used in the forms of the `edit` and `create` views, to quickly generate the urls base in the current action.

The example used by the `create` view:

```html
<form method="POST" action="{{ Helper::toRoute('store') }}">
```

In the case of the `edit` view, it would be:

```html
<form method="POST" action="{{ Helper::toRoute('update') }}">
```

Obtaining the resource identifier (ID) automatically, and generating the url from it.

#### route_path()

It generates the partial path to a file, based on the **Belich** configuration.

```php
/**
 * Get the resource path
 *
 * @param string $file
 *
 * @return string
 */
private function route_path(string $file): string
{
    return sprintf('%s/%s', config('belich.path'), $file);
}
```
