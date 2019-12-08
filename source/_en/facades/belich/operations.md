---
title: Belich facades - Operations
description: Managing Belich's facades to perform operations
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich facades: Operations

#### count()

It allows us to obtain the total number of results of an object or array. The format used would be:

```php
Belich::count($value, int $initialValue = 0)
```

The variable `$ value`, would be the array or object to be counted. The method allow a second parameter, which facilitates us to start the account at the value we need. By default, it will be 0. For example:

```php
Belich::count(\App\Models\User::all())
Belich::count([1, 2, 3, 4, 5])
```
