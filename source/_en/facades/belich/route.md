---
title: Belich facades - Routes
description: Managing Belich's facades to get all the available information about the routes
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich Facade: Routes 

#### action()

It will return the last value of the `route` function, that is, the action that is taking place in the *Controller* of the package. It will return four states by default:

`index`, `edit`, `create` and `show`.

#### actionRoute()

It generates a direct link for an action, from any of the four supported actions. The format would be as follows:

```php
Belich::actionRoute($controllerAction, $data)
```

As an example:

```php
Belich::actionRoute('index')
```

We would return a link to the index of the current resource. The second parameter `$data`, we can pass it in two ways:

- As an object, obtaining the ID from it.
- As an integer, using the ID directly.

As an example:

```php
Belich::actionRoute('edit', $model)
Belich::actionRoute('edit', 201)
```

#### route()

Belich's paths are automatically generated in the following format: `dashboard.resource.action`. Now let's imagine that our current route is `dashboard.users.index`. The `route ()` method will return an array with the three values of the route:

```php
[
    'dashboard',
    'users',
    'index'
] 
```


