---
title: Features
description: Belich dashboard features
extends: _layouts.documentation
section: content
locate: en
folder: home
---

# Features 

- Top or side navigation bar.
- Direct download of resources, in format: EXCEL or CSV.
- Authorization management through `Policies`, fully integrated.
- [Fontawesome](https://origin.fontawesome.com){.link-out} icons integrated.
- Cache management.
- HTML minification (with filters and fully customized).
- Customization of:
    + Action buttons.
    + Top navigation bar.
    + Sidebar.
    + Breadcrumbs.
    + Thumbnails.
    + Home page or dashboard.
    + etc ...
- Graphics:
    + Using [Chartist](https://gionkunz.github.io/chartist-js/index.html){.link-out}, ultra light library.
    + Preconfigured tools for rapid development.

As an example, to show the users registered in the last week, we would only have to add the following code:

```php
use App\User;
use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;
use Daguilarm\Belich\Components\Metrics\Labels;
use Illuminate\Http\Request;

/**
 * Set the displayable labels
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheMonth();
}

/**
 * Calculate from model
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->cacheInMinutes(10, $this->uriKey())
        ->thisWeek()
        ->totalByDay();
}
```
