---
title: Cards cache
description: Gestionando Cache en tarjetas (Cards)
extends: _layouts.documentation
section: content
locate: en
folder: cards
---

# Cards cache

The first version of this package included a native cache system, but after careful thought, it was concluded that it was against the philosophy of **Belich**.

The idea of **Belich** is to facilitate development and give the developer freedom. Introducing a native cache system would have meant limiting for this freedom and curbing development options too much.

Another aspect that has been taken into account, is that we are not always going to need to cache databases in our *Controller*, and if it will be necessary, it is the best way to proceed just implementing the cache directly.

Let's see an example of how to do it:

```php
namespace App\Belich\Cards;

use Daguilarm\Belich\Components\Cards\Card;
use Illuminate\Http\Request;

class UserCard extends Card {

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
        $users = Cache::rememberForever('users', function () {
            return \App\Users::all();
        });


        return [
            'users' => $users,
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

So, in the *View*, we can be able to access to `$users` through the variable: `$card->withMeta`.

>Surely, in the future we decide to change this, but today, I think it is the best option.
