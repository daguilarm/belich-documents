---
title: Tools
description: Managing Tools with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Tools
**Belich** has a series of tools by default, which can be used on both the home page: `resources\views\vendor\belich\dashboard.blade.php`, and in any *Resource*, using them as `Cards`.

Our main page, already includes some components by default:

```php
// resources\views\vendor\belich\dashboard.blade.php

@extends('belich::layout')

@section('content')
    <div class="flex flex-wrap my-8 mx-6 p-4 rounded bg-white {{ config('belich.navbar') === 'top' ? 'shadow-md' : '' }}">

        {{-- Calendar --}}
        <belich::calendar width="w-1/3"></belich::calendar>

        {{-- Model to table --}}
        <belich::model :columns="['id', 'name', 'email']" model="\App\User" width="w-2/3" limit="5" ></belich::model>

    </div>
@endsection
```

But we can use these tools as if they were `Cards`, and include them in our *Resources*. To do this, we must create a new `Card` and include it in the *Resource*:

```php
// app\Belich\Resources\User.php

/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request): array
{
    return [
        (new \App\Belich\Cards\CalendarCard($request)),
    ];
}
```

We create our `Card`:

```php
// app\Belich\Resources\Cards\CalendarCard.php

/**
 * Return the view
 *
 * @return string
 */
public function view() : string
{
    return 'cards.calendar';
}
```

And then in the `Card` in question, we return the route of our new view. In the previous example, our component is located in the folder: `Resources\Views\Cards`

```php
// resources\views\cards\calendar.blade.php

<belich::calendar id="tool-calendar" width="w-1/3"></belich::calendar>'
```

The default components are in the folder:

`resources\views\vendor\belich\components\tools`

At the moment, the following tools are available:

![Default Tools](../../../assets/images/tools.jpg){.mx-auto}
<div id="legend"><b>fig 1</b>: Default components</div>

### Calendar

It shows us a calendar, which we can show in our views as follows:

```php
//Calendar
<belich::calendar id="tool-calendar" width="w-1/3"></belich::calendar>
```

Where can we configure the fields: `id` y `width`.

### Model to table

It shows us a table with the results of a model, being able to configure what fields appear and their number.

```php
//Model to table
<belich::model id="tool-model" :columns="['id', 'name', 'email']" model="\App\User" width="w-2/3" limit="5" ></belich::model>
```

Where can we configure the fields:

- **id**
- **columns**: By sending an *array* with all the columns of the table we want to show.
- **model**: Indicating where our *Model* is located, in order to be able to instantiate it.
- **width**: Where we indicate the width of the component.
- **limit**: The number of results to show in the table.
