---
title: Directives for Blade
description: Managing directives for Blade
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Directives for Blade

**Belich** includes, a series of directives for `Blade`, to facilitate the use of the *package* in the views.

### @icon

This directive allows us to add an icon of [Fontawesome](https://origin.fontawesome.com/){.link-out} quickly. As an example:

```php
@icon('edit')
```

Will return us:

```php
<i class="fas fa-edit"></i>
```

We can add an optional second parameter, with a text. For example:

```php
@icon('edit', 'Edit text')
```

Will return us:

```php
<i class="fas fa-edit mr-2"></i>Edit text
```

When adding a text, **Belich** will automatically add the tailwind class `mr-2` to create a separation between the text and the icon.

You can add a text from a language file, to do so, you must use the following code: `@icon('edit', 'belich :: file.fileText')`. In this case we assume that the file is in the *vendor* folder of our *package*, if we have it directly in the **Laravel** language folder, we would have to do it like this: `@icon('edit', ' file.fileText ')`.

It can also be used as a helper, using the following syntax:

```php
Helper::icon('edit', 'Edit text')  
Helper::icon('edit', 'belich::file.fileText')
```

You can also customize the appearance of the icons through the css class: `.icon`, which we can always overwrite.

### @actionIcon

Same as `@icon`, but does not accept text. It is designed for the icons from the action buttons (in the `index` view).

### @hasSoftdelete

Check if a model has the trait *softdelete*. 

It's what **Laravel** calls *Custom If Statements*, therefore, it works as if it were a `@if` directive.

```php
@hasSoftdelete($model)  
    //Staff
@endif
```

### @hasSoftdeletedResults

Same as the previous one, but this time, check if the current value of the model is eliminated or not (with softdelete).

It is a helper to be used with the action buttons of the `index` view.

For example, if we want to know if the current value has been deleted or not, in order to show the restore icon or to delete icon...

### @mix

Ideal for creating a style sheet or javascript link. It is intended for when we want to call a **JS** or **CSS** file inside the folder: `vendor/belich`. 

The syntax will be:

```php
@mix('app.js')
```

Generating the code:

```php
<script src="{{ mix('app.js', 'vendor/belich') }}"></script>
```

Rendering in:

```php
<script src="/vendor/belich/app.js?id=bfc1e2cb4216d35a1a8d"></script>
```

The directive will look for the file extension (.js or .css) and depending on which one it finds, it will render the code in one way or another.

### @trans

Like the `@mix()` directive, it is intended to load the language file from the `vendor/belich` folder.

The syntax will be:

```php
@trans('file.fileName')
```

Generating the code:

```php
{{ trans('belich::file.fileName') }}
```

So `@trans('file.fileName')` will be equivalent to `@lang('belich:file.fileName')`.
