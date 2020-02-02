---
title: Configuration file
description: Configure Belich configuration file
extends: _layouts.documentation
section: content
locate: en
---

# Configuration file

The configuration file is generated in the Laravel configuration folder: `\config\belich.php`.

In this file, we will be able to configure **Belich** simply and quickly. It has different sections, which we will see one by one.

### Application settings

- **name**: The name of the application. By default:`Belich Dashboard`.
- **path**: The route from which Belich will be accessed. By default: `dashboard/.
- **url**: Url where **Belich** is located. By default:`/`.
- **profile**: Boolean field, which allows us to activate or deactivate the resource `\App\Belich\Resources\Profile.php`. 

By doing this, we remove the references inside the code to this file, but in the navigation bar, it will continue to be displayed. To eliminate it, we have two options:

1. Delete the file `\App\Belich\Resources\Profile.php`. Not recommended, it is always better to disable than to remove...
2. Disable the display of the resource in the navigation bar. To do this, in the file `\App\Belich\Resources\Profile.php`, we will look for the property
 `public static $displayInNavigation` and we will deactivate it:

```php
/** @var bool */
public static $displayInNavigation = false;
```

### Navigation

**Belich**, offers two ways of navigation, using top or side bar.

- **navbar**: support two options `top` or `sidebar`.

```php
'navbar' => 'top',
```

Default option, is `top`. In it the sidebar is dispensed with, and the resources are shown in the top bar. It is the preferred option when we are going to show large tables with a lot of data.

The `sidebar` option offers us the resources in the sidebar, and leaves the upper deck to show the user configuration and the end of session.

We can also define a default icon in our navigation bar, using the field:

```php
'defaultIcon' => 'caret-right',
```

>**Belich** use [Font-awesome](https://origin.fontawesome.com/icons?d=gallery){.link-out}, so you only have to add the name of the icon, as shown on the page.

### Middleware

We can configure the middleware according to our needs. By default, they are used:

- **https**: middleware to ensure that a secure url is always used. This option is optional and can be eliminated without major problem.
- **web**: load a good part of the middleware that Laravel offers by default. Remove only if it is known what is being done.
- **auth**: Laravel default authentication. Remove only if it is known what is being done.

To add custom middleware, we just have to add it to the array:

```php
'middleware' => [
    'https',
    'web',
    'auth',
    'customMiddelware1',
    'customMiddelware2',
    ...
],
```

### Export file

Selection of the export driver from databases to files. From here, you can configure which driver Belich will use to generate `XLS`,` XLSX` or `CSV` files, from the database.

Select the driver you prefer, from the list provided:

```php
'export' => [
    'driver' => 'fast-excel',
],
```

### Allowed parameters in the URL

**Belich**, limits the parameters that can be sent by the URL, and therefore, be used by the application. If we add parameters to the URL, **Belich** will automatically delete them, therefore, if we want to add new parameters, we will have to do so through the `allowedUrlParameters` field.

By default, it looks like this:

```php
'allowedUrlParameters' => []
```

That is, it only uses Belich's default parameters. If we want to add our own parameters, we will have to do it as follows:

```php
'allowedUrlParameters' => ['param1', 'param2',...]
```

### Minimize the HTML of the application

**Belich** uses a middleware to compress the HTML code of the application, before being cached by Laravel. This process brings a decrease in the size of the web. This decrease in size is usually around 25%, although it is variable, and will depend on the characteristics of each project.

By default, this option is activated, but it can be deactivated easily:

```php
'minifyHtml' => [
    'enable' => false,
]
```

It may happen that this middleware affects other parts of the project, causing it to not work properly.

For example, to avoid problems with exporting files, it has been disabled on all routes that **Belich** uses to export files. From this situation (problems with the middleware and downloads), it was decided to allow the configuration of routes that can be excluded from this middleware.

It can be done in two ways:

1. Indicating what actions we want to exclude from the `middleware`:

```php
'minifyHtml' => [
    'enable'    => true,
    'except'  => [
        'actions' => ['index', 'show'],
        'paths'   => [],
    ],
],
```

2. Indicating the urls we want to exclude:

```php
'minifyHtml' => [
    'enable'    => true,
    'except'  => [
        'actions' => [],
        'paths'   => ['dashboard/users'],
    ],
],
```

    No need to worry about whether our route starts or ends with `/`. **Belich** removes them automatically.

### Remove Components (Graphics and Cards) based on screen size

We can tell Belich, we don't want to show `cards` or `metrics` on large devices, for this, we will do the following:

```php
'hideComponentsForScreens' => ['lg'],
```

The supported values are:

- **sm**: from 576px.
- **md**: from 768px.
- **lg**: from 992px.
- **xl**: from 1200px.

### Date format

We can define the format in which we want to show the dates in the application.

This value will be used in the `Date` form fields. These fields will return the value in the views: `index` and` show`, according to what we define:

```php
/*
|--------------------------------------------------------------------------
| Date format
|--------------------------------------------------------------------------
|
| Define the default date format. This format will be use in the Controller actions: index and show.
*/
'dateFormat' => 'd/m/Y',
```

It will return us (for example):

~~~
30/12/2018
~~~

### Results Pagination

We can use the two types of pagination that **Laravel** has by default: 

- Links (link)
- Simple pagination (simple)

To do this, we have the variable `pagination`:

```php
/*
|--------------------------------------------------------------------------
| Pagination
|--------------------------------------------------------------------------
|
| Define the paginate style. Two styles available: link or simple
*/
'pagination' => 'link',
```

### Use live search in the Belich index

The `enable` field allows us to activate the search or remove it from **Belich** views.

The `minChars` field determines the minimum number of characters required for the search to be performed.

```php
'liveSearch' => [
    'enable' => true,
    'minChars' => 2,
],
```

### Set character reduction of textArea fields

This field allows us to limit the text shown in the form fields: `textarea`, limiting it to the number of characters we configure.

```php
'textAreaChars' => 25,
```

### Icon manager

**Belich** allows you to manage different icon libraries. At the moment, it has drivers for:

- Fontawesome.

We can define the icon library, using the key: `font`. The load indication icon can be defined with the key: `loading`, and its two sub-keys:

- **icon**: to indicate the icon library we want to use.
- **css**: to define the `css` styles that we want to use. By default, increase the size tenfold, and show the icon in light blue.

```php
/*
|--------------------------------------------------------------------------
| Icons
|--------------------------------------------------------------------------
|
| Show the loading icon for ajax queries
*/
'icons' => [
    'font' => 'fontawesome',
    'loading' => [
        'icon' => 'spin',
        'css' => 'fa-10x text-blue-200',
    ],
],
```

If we are using `Fontawesome`, the previous example will return:

```html 
<i class="fas fa-spinner fa-spin fa-10x text-blue-200"></i>
```

### Cards 

The **Cards** generated by **Belich**, require of a view for rendering. From this *config* file, we can define the path where these views are located.

>It is useful when we create the **Cards** from [Artisan](cards/cards-controller')

```php
/*
|--------------------------------------------------------------------------
| Cards
|--------------------------------------------------------------------------
|
| Define the storage directory for card views. By default Belich will create all the
| views for the Cards in the folder: /resources/views/vendor/belich/cards/
*/
'cards' => [
    'path' => resource_path('views/vendor/belich/cards'),
], 
```
