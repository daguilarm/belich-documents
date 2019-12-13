---
title: Cache for graphics
description: Managing cache for graphics with Belich
extends: _layouts.documentation
section: content
locate: en
folder: metrics
---

# Cache for graphs

To allocate the cache, a *helper* has been created, mainly thinking about the changes in the cache that were integrated in **Laravel 5.8**.

The use of the *helper*, will allow us to save all the data as a `Carbon\Carbon` object, and to be able to use the format we like the most: seconds, minutes, hours,...

All methods need two parameters:

- The amount of time.
- A unique key.

>The best option for the unique key is to pass the `$this->uriKey()` of the graph, but you can use the one that suits you.

It must be included in the method [calculate()](metrics-calculate):

```php
/**
 * Make calculations
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->cacheInMinutes(10, $this->uriKey())
        ->lastMonth()
        ->totalByDay();
}
```

The methods available to manage the cache are:

- `cacheForEver()`
- `cacheInMinutes(int $minutes, string $key)`
- `cacheInHours(int $hours, string $key)`
- `cacheInDays(int $days, string $key)`
