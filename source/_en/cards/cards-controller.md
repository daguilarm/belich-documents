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

The *Controller* will be generated in the folder: `\App\Belich\Cards`, and will have the following structure:

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

A través del método `view()`, definimos la ubicación de la vista. Por tanto, podemos ubicar la vista donde queramos.

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

>Importante: debemos indicar la ruta correcta de nuestra Vista, sobre todo si modificamos el archivo de configuración (`app\config\belich.php`) y la ruta por defecto.
