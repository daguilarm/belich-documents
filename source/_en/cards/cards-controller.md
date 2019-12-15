---
title: Card Controllers
description: Managing Card Controllers
extends: _layouts.documentation
section: content
locate: en
folder: cards
---

# Card

A **Card**, can be generated using the console:

```php
artisan belich:card CardName
```

This command will create two files: a *View* and a *Controller*.

The *Controller* will be generated in the folder: `\app\Belich\Cards`, and will have the following structure:

```php
namespace App\Belich\Cards;

use Daguilarm\Belich\Components\Cards\Card;
use Illuminate\Http\Request;

class UserCard extends Card {
    /**
     *
     * @var string
     */
    public $width = 'w-full';

    /**
     * Initialize the card
     *
     * @return string
     */
    public function __construct(Request $request)
    {
        parent::__construct();
    }

    /**
     * Return the view
     *
     * @return string
     */
    public function view() : string
    {
        return 'belich::cards.users';
    }

    /**
     * Return the view data
     *
     * @return string
     */
    public function withMeta() : array
    {
        return [
            'data1' => 'Example 1',
            'data2' => 'Example 2',
        ];
    }

    /**
     * Get the URI key for the card
     *
     * @return string
     */
    public function uriKey() : string
    {
        return 'user-card';
    }
}
```

This file, will allow us to save all the logic of the `Card`, and therefore, the view will be free of `Php` code.

The view will be stored by default in:

~~~
./resources/views/vendor/belich/cards/
~~~

>This can be easily changed from the file: `app\config\belich.php`.

## Available methods

Each **Cards** file has a series of methods, which we are going to describe below:

### view()

Through the `view()` method, we can define the location of the view. Therefore, we can locate the view where we want.

```php
/**
 * Return the view
 *
 * @return string
 */
public function view() : string
{
    return 'belich::cards.users';//By default in /resources/views/vendor/belich/cards/users.blade.php
}
```

>Important: we must indicate the correct path for our *View*, especially if we have modified the configuration file (`app\config\belich.php`) and the default route.

### withMeta()

We also have the `withMeta()` method that will allow us to return an *array* with variables that will be injected directly into the *View*.

```php
/**
 * Return the view data
 *
 * @return string
 */
public function withMeta() : array
{
    return [
        'data1' => 'Example 1',
        'data2' => 'Example 2',
    ];
}
```

In the previous example, we will have available in our view, the variables:

- `$data1`
- `$data2`

Within de variable: `$card->withMeta`:

```php 
[
  "data1" => "Example 1"
  "data2" => "Example 2"
]
```

### uriKey()

As was the case with [Graphs](metrics/metrics-default), we have the `uriKey()` method that will allow us to identify with a unique key our `Card`.

And we also have the option to determine the width of our `Card`. We can do it in two ways:

a) Using the variable `$width` in the *Controller* file: `\app\Belich\Cards\CardName.php`.

```php 
/**
 *
 * @var string
 */
public $width = 'w-full';
```

b) From the *Resource*: `App\Belich\Resource\MyResource.php`, as follows:

```php 
App\Belich\Resource\MyResource.php

/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request): array
{
    return [
        (new \App\Belich\Cards\MyCard($request))->width('w-1/3'),
    ];
}
```

### Important!

Don't remove the *Constructor*:

```php 
/**
 * Initialize the card
 *
 * @return string
 */
public function __construct(Request $request)
{
    parent::__construct();
}
```

<div class="blockquote-alert">
    Important!: Don't remove the <i>Constructor</i> of class or nothing will work properly...
</div>

