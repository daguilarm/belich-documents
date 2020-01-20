---
title: Search filters
description: Managing search filters with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Search filters

**Belich** use a filter system to refine searches in the view: `index`.

![Filters](../../../assets/images/filters.jpg){.mx-auto .wp-66}
<div id="legend"><b>fig 1</b>: Search Filters Example</div>

To use the filters, we must add them to our resources. For example, to add a filter to the resource: **User** (as in the previous example), we will go to the file: `app\Belich\Resources\User.php`, and we will add the following method:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function filters(Request $request): array
{
    return [
        Filter::make('By Role', 'role')
            ->filterAs('equal')
            ->options([
                'user' => 'User',
                'manager' => 'Manager',
                'admin' => 'Admin'
            ]),
    ];
}
```

For example, if we select the first option in the example above: `['user' => 'User']`, we would create the following query: 

```php 
select * from `users` where `role` = 'user' limit 10 offset 0
```

The format for the method `filter()` will be:

```php 
Filter::make($label, $tableRowForSearch)...
```

In the first field, we add the name of the label that will be displayed in the drop-down, and in the second, the table of the database we want to filter.

We can indicate different types of filters, using the method: `filterAs()`:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function filters(Request $request): array
{
    return [
        Filter::make('By Role', 'role')
            ->filterAs('equal')
            ->options([
                'user' => 'User',
                'manager' => 'Manager',
                'admin' => 'Admin'
            ]),
        Filter::make('By ID', 'id')
            ->filterAs('operations')
            ->options([
                '0-10' => 'Between 0-10',
                '11-30' => 'Between 11-30',
                '31-50' => 'Between 31-50',
                '>50' => 'Greater than 50',
                '<15' => 'Minor than 15',
            ]),
        Filter::make('By Name', 'name')
            ->filterAs('like')
            ->options([
                'a%' => 'Start with a',
                'b%' => 'Start with b',
            ]),
    ];
}
```

<div class="alert info">If we do not use the method <strong>filterAs()</strong>, will assume <strong>equal</strong> as a default value</div>

The filters supported by **Belich** are:

- **equal**: it is the default value, so it is not necessary to indicate it. It is the case of the first example.
- **like**: will perform a search using `like`.
- **operations**: It allows us to perform advanced operations: 
    + Intervals: we must indicate the interval separated by `-` 
    + Greater or less than: `>30`, will look for results greater than 30 and `<30` the results minors to 30.

The special method for dates would have the following format:

```php
Filter::make('By Creation date', 'created_at')
    ->filterAs('date')
    ->format('d/m/Y')
    ->mask('00/00/0000'),
```

![Filters](../../../assets/images/filters-date.jpg){.mx-auto .wp-66}
<div id="legend"><b>fig 2</b>: Date filter Example</div>

Where we have two methods: `format()` y `mask()`.

## format()

It allows us to indicate the format used in the fields to enter the date. If left blank, the following format will be used by default: `d/m/Y`.

## mask()

It allows us to define the mask for the date format. It must be consistent with the method `format()`. By default, the value will be: `99/99/9999`. The value 9 in the mask represents that the field only supports numeric characters. 

For more information on the use of the method `mask()`, visit the next section: [mask()](../fields/patterns)
