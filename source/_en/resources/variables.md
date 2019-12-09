---
title: Resources - Available variables
description: Resource management with Belich. Available variables
extends: _layouts.documentation
section: content
locate: en
folder: resources
---

# Available variables

Below are all the available configuration variables for a resource.

### accessToResource

This variable will allow us to disable access to a resource, and therefore, prevent it from being available for navigation.

```php
/** @var bool */
public static $accessToResource = false;
```

This variable is activated (with the value *true*) by default, so it is not necessary to add it.

### actions

**Belich** has a series of `blade` files, which are located in the folder: `\resources\views\actions\`. In these files are the action buttons, which will appear in the `index` view of all the resources:

```php
@can('view', $model)
    <a href="{{ Belich::actionRoute('show', $model) }}" class="action">@actionIcon('eye')</a>
@endcan

@can('update', $model)
    <a href="{{ Belich::actionRoute('edit', $model) }}" class="action">@actionIcon('edit')</a>
@endcan

@can('delete', $model)
    <a href="{{ Belich::actionRoute('destroy', $model) }}" class="action">@actionIcon('trash')</a>
@endcan
```

By default, **Belich** accesses the `default.blade.php` file, but we can create (in that folder), our own custom file to be used in our resource, so we can create different files for each resource.

Now, we just have to tell **Belich** what file to use in each resource, for example, if we create a new file, called `newAction.blade.php`:

```php
/** @var string */
public static $actions = 'newAction';
```

>Only use if we want to change the default file.

### Controller actions 

Sometimes, we need that the form send the information to a custom controller, instead of using the **Belich** default **CRUD** controller. To do this, we will have to indicate the location of the new controller, as follows:

```php
/**
 * @var string
 */
public static $controllerAction = '\App\Http\Controllers\TestController';
```

**Belich**, automatically will add to the views: `create` and ` edit`, the method on which to act, for example, if we are in the `create` view, it will automatically inject the following into our form:

```html
<form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-create" id="form-responsecontrollers-create" action="{{ action('\App\Http\Controllers\TestController@create') }}">
```

And in the case of the view `edit`:

```html
<form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-edit" id="form-responsecontrollers-edit" action="{{ action('\App\Http\Controllers\TestController@update') }}">
```

In short, a simple way to use our own *Controller*, to resolve the form.

### displayInNavigation

It serves to indicate if we want the resource to appear in both of the menus: top and side.

```php
/** @var bool */
public static $displayInNavigation = true;
```

This variable is activated (with the value *true*) by default, so it is not necessary to add it.

### downloable

It is used to indicate if the resource can be exported to the different formats available.

```php
/** @var bool */
public static $downloable = true;
```

This variable is activated (with the value *true*) by default, so it is not necessary to add it.

### group

It serves to indicate that our resource should be grouped into a specific group, creating a menu and its respective submenu in navigation.

```php
/** @var string */
public static $group = 'My Group Name';
```

If left blank, the resource will be considered as root, and no sub-levels will be assigned, remaining as follows (Resource 3):

```php
\Group1
    \Resource 1 
    \Resource 2
\Resource 3
```

### icon

We can associate our resource with an icon of [Font-Awesome](https://origin.fontawesome.com){.link-out}. To do this, we must do the following:

```php
/** @var string */
public static $icon = 'user-friends';
```

We simply have to indicate the name that `fontawesome` uses for the icon.

>This value is disabled by default, so we must indicate the name of the icon if we want it to be displayed.

### Resource name 

To identify the resource, we use tags. These tags are used by **Belich**, to refer to the resource in: menus, breadcrumbs, etc.

There are two types of tags to identify the resource, the singular and the plural: `$label` and `$pluralLabel`.

```php
/** @var string */
public static $label = 'User';

/** @var string */
public static $pluralLabel = 'Users';
```

>If we leave them blank, the system will identify the resource with the name of the file, and its plural version.

### model

We must tell **Belich** which model to use and where it is located:

```php
/** @var string [Model path] */
public static $model = '\App\User';
```

>This field is required

### redirectTo 

After performing an action, for example, create a resource. We can tell **Belich** where we want to redirect.

```php
/** @var string */
public static $redirectTo = 'index';
```

We must indicate the action we want to resolve. The available actions are:

- **index**
- **show**
- **create** 
- **update**

>By default, **Belich** will redirect to the index.

### relationships 

To avoid N+1 problems in database queries, and use `eager loading`, we must tell **Belich** what relationships you should add to the query.

>Only when we use `Text` type fields and we want to obtain the data from a relational field (for example, if we are showing the user data, and we want to show data that is in their profile...). Otherwise, we have direct relational fields, such as: `HasOne`, `HasMany`, `BelongsTo`,...

```php
/** @var array */
public static $relationships = ['billing'];
```

### tableTextAlign 

It will allows to align the index table, according to our needs. By default, the value is the left alignment. The Allowed values are: `left`, `center`, `right` y `justify`.

```php
/** @var string */
public static $tableTextAlign = 'center';
```

### softDeletes

We must tell **Belich**, if our model includes `softdeletes`. If so, let's give it as follows:

```php
/** @var array */
public static $softDeletes = true;
```

>By default it is disabled.
