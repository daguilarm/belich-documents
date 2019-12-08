---
title: Belich facades - blade
description: Managing belich facades to render html through blade
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich facades - blade

In this section, we will find methods to render `HTML` code.

## Methods for Blade (generating HTML)

Sometimes we need to generate HTML code in *Blade*, and we don't want to add `PHP` code to our template. For this, some helpers have been developed to be used directly.

Normally, these methods are used by the system, but they can be useful for developing your own modules, new form fields or packages, in any case, whether they serve or not, here they are available for use.

The supported methods are:

#### value()

Modify the value of a field by displaying it in the view. It is used, when this field has a relationship, or uses the `displayUsing` or` resolveUsing` methods. 

Use the following syntax:

```php
Belich::value($field, $model)
```

It is used by the system in views `index` and `show`.

