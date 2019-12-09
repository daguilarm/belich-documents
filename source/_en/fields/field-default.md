---
title: Form fields
description: Form Field Management
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Form fields

The forms are managed from the resources folder. That is, they can be found in the path: `\App\Belich\Resources\`

In this folder we will find all the resources of the application. 

In the resource file, we will find the method: `fields()`. This is where we will configure our form:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('User name', 'name')
            ->id('user_id')
            ->defaultValue('Usuario 1')
            ->help('this is a help text')
            ->rules('required'),
        Text::make('Invoice Nº', 'user_name', 'billing')
            ->disabled()
            ->sortable()
            ->hideFromIndex()
            ->help('this is a help text')
            ->rules('required'),
        Select::make('Professions', 'professions')
            ->options(\App\Models\Profession::all())
            ->defaultValue(1),
    ]
}
```

This would be an example of how our form fields function would work.

This form is responsible for displaying the four views offered by each resource: `index`, `create`, `edit` y `show`. 

>Each view will automatically be rendered based on the `fields()` information.

All types of fields must include a method called `make()`. This method, supports two variables: `$label` and `$attribute`, that is, this method would be as follows: `make($label, $attribute)`.

This rule, which applies to the `make()` method, is fulfilled (usually) for all non-relational fields: `Text`, `Select`, `Hidden`, `Textarea`.., undergoing some changes in the relational fields: `BelongTo`,...

The `$label` field will generate the `<label ` tag of the form, while the `$ attribute` field represents the column of the database linked to the form field.

>The `fields()` method receives the `$request` variable. This is so, in cases where you need to use some data to execute an operation. For example: `$request->user()->isAdmin()`.
