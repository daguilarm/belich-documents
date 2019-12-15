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

It will be saved in the folder: `\App\Belich\Cards`, and will have the following structure:

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

This file, which will act as *Controller*, will allow us to save all the logic of the `Card`, and therefore, the view will be free of `Php` code.

Through the method `view()`, we define the location of the view. Therefore, we can locate the view where we want, although by default, the location for the **Cards** views will be:

~~~
./resources/views/vendor/belich/cards/
~~~

