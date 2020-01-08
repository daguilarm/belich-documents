---
title: HasOne Relational Field
description: Managing HasOne Relational Fields in Belich
extends: _layouts.documentation
section: content
locate: en
folder: relationships
---

# HasOne

The relationship `hasOne()`, will allow us to link a model that depends solely on another. It is the equivalent of a *one-to-one* relationship in **Laravel**.

Let's imagine two models: `User` and `Profile`, now let's use the usual code of **Laravel** to indicate that the `User` model has a relationship with the` Profile` model:

```php
//app\User.php

public function profile() 
{
    return $this->hasOne(\App\Profile::class);
}
```

Now, in our resource: `\App\Belich\Resources\User.php`, We can add a form field for *one-to-one* relationship:

```php
HasOne::make('Profile avatar', 'Profile', 'profile_avatar')
    ->rules('required'),
```

The structure of the field will be:

```php
HasOne::make(string $label, string $relationshipClass, ?string $relationshipModelColumn = null),
```

- `$label`: It is the field label.
- `$relationshipClass`: It is the resource of the relational model. Following our example: `\App\Belich\Resources\Profile.php`.
- `$relationshipModelColumn` is the column of the relational table (in our example: `profiles`), which we want to show in the relationship. We can leave it blank, and start it from the `User` resource, as follows:

```php
// /** @var string */
public static $column = 'profile_avatar';
```

>We can indicate the column of the relational database in two ways: as the last variable of the `HasOne::make()` method or as a static variable `$column`. **This field allows us to indicate the column of the relationship whose value we want to show. We can't leave it blank.**

### Views: **index** and **show**

By default, this is an informational field, so it will only be displayed in the views: `index` and `show`. 

In these views, we will find a link with the value of the field, and pointing it to the `show` view from the relational model:

```html
// \App\Belich\Resources\User.php

<a href="/dashboard/profiles/1" class="show-link"> https://lorempixel.com/200/200/people/?82133</a>
```

### Views **create** and **edit**

####a) **Create** view

In the view `create`, it will show us a text field assigned to the column of the related model, so using the previous examples, it would be the `profile_avatar` field from the `profiles` table.

When creating the new user, you will create a profile for this new user (automatically), with the relational values that we indicate:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        ID::make('Id'),
        Text::make('User', 'name')
            ->rules('required'),
        Text::make('Email', 'email')
            ->rules('required', 'email'),
        HasOne::make('Profile avatar', 'Profile', 'profile_avatar')
            ->rules('required'),
        HasOne::make('Profile address', 'Profile', 'profile_address')
            ->rules('required'),
    ];
}
```

**Belich** will create a row in the profile database, with the following parameters:

```php
[
    'id' => 1, //Autoincrement...
    'user_id' => 1, //Our auth()->user()->id
    'profile_avatar' => 'https://lorempixel.com/200/200/people/?82133',//For example
    'profile_address' => '9469 Etha Roads',//For example
]
```

>To the `HasOne` relational field, we can add any validation rule we want.

####b) **Edit** view

If we go to the `edit` view, we will find that it will show us a `Select` field, with all the `indexQuery()` values from the `Profile` resource:

```php
// \App\Belich\Resources\Profile.php

/**
 * Build the query for the given resource.
 *
 * @return Illuminate\Database\Eloquent\Collection
 */
public function indexQuery() {
    return $this->model()
        ->where('id', request()->user()->id);
}
```

If we look closely, in this example, we could only see our profile. But, **what if we want to customize the query to the database, ignoring the default query in the relational resource?**. **Belich**, have a method to customize this query:

```php
HasOne::make('Profile address', 'Profile')
    ->rules('required')
    ->query(function($query) {
        return $query
            ->where('user_id', auth()->user()->id)
            ->pluck(static::$column, static::$column)
            ->toArray();
    }),
```

> Remember that we must return the result as **array**. 

> Regarding the columns returned in the array, we must return only the relational **column**: `pluck(static::$column, static::$column)`, if we return the **id** column: `pluck(static::$column, 'id')`, this field will be the one stored in the database... and usually we don't want this situation, do we?...

We can find, in the situation that the query returns too many values for a `Select` field. To do this, we have the option to show the result as a `datalist`, using the method `searchable()`:

```php
HasOne::make('Profile address', 'Profile')
    ->rules('required')
    ->searchable(),
```

Having the option to do a search among the data available in the field, like a `Autocomplete` field.å
