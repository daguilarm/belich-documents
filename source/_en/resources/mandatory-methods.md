---
title: Resources - Mandatory methods
description: Resource management with Belich. Mandatory Methods
extends: _layouts.documentation
section: content
locate: en
folder: resources
---

# Mandatory methods

We have a series of methods that must be included in each resource:

### fields()

This method will allow us to generate the different form fields of each resource:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        ID::make('Id'),
        Text::make('Name', 'name')
            ->sortable()
            ->rules('required'),
        Text::make('Email', 'email')
            ->rules(
                'required', 
                'email', 
                'unique:users,email'
            )
            ->sortable(),
        Password::make('Password', 'password')
            ->creationRules(
                'required', 
                'required_with:password_confirmation', 
                'confirmed', 
                'min:6'
            )
            ->updateRules(
                'nullable', 
                'required_with:password_confirmation', 'same:password_confirmation', 
                'min:6'
            )
            ->onlyOnForms(),
        PasswordConfirmation::make('Password confirmation'),
    ];
}
```

You can find more information at: [Form fields](../fields/intro), where all available options are specified.

### cards() 

It serves to indicate to the resource which components (cards) should include:

```php
/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request) {
    new \App\Belich\Cards\UserCard($request),
}
```

You can find more information at: [Cards](../cards/card), where all available options are specified.

### metrics()

It serves to indicate to the resource what metrics should include:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        new \App\Belich\Metrics\UsersPerMonth($request),
        new \App\Belich\Metrics\UsersPerDay($request),
        new \App\Belich\Metrics\UsersPerHour($request),
    ];
}
```

You can find more information at: [Graphs and Metrics](../metrics/metrics), where all available options are specified.

### Assign width to Graphics and Cards from the resource

You can also assign the width of the metric (or card) directly from here, without the need to configure the metric (or card) file. As an example (valid for both):

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        (new \App\Belich\Metrics\UsersPerMonth($request))->width('w-1/3'),
        (new \App\Belich\Metrics\UsersPerDay($request))->width('w-2/3'),
    ];
}
```
