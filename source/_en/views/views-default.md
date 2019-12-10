---
title: Views
description: View Management
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Views

In all views, there are two available variables: `$request` and `$resources`. These variables will be useful when customizing your views.

Let's start talking about each of them separately:

### request

It is the variable sent to the views from the controller. Depending on the view, you will have more or less information.

Access to the parameters of the `$request` variable, is done as if it were an object:

```php
$request->actions
```

The parameters supported by `$request` (and which will be available depending on the view), are:

- **actions**: Indicates which file should be loaded to generate the action buttons in the `index` view. They can be configured in each resource.

- **autorizedModel**: It returns the current model to be used by the authorization mechanisms of **Laravel**.

For example, in one of our views, we can do the following:

```php
@can('create', $request->autorizedModel)
    <button class="btn btn-primary">Create</button>
@endcan
```

- **breadcrumbs**: It contains all the information necessary to generate the breadcrumbs. It can also be customized.

- **fields**: Include all form fields from the resource.

- **name**: Returns the name of the current resource.

- **results**: The response of the database for the current controller. It will help us to show the results.

- **total**: It is the number of columns from the table that is generated in the view: `index`.

- **id**: Depending on the view, it will be the `ID` of the current resource. It can be accessed directly through `Belich::resourceId()`.

### resources

It is the list of all the resources we have in Belich. It is used to generate the navbar and the sidebar.

It gives us access to the full list of resources and their properties. Basically, it is the result of the injection in view of [Belich::resourcesAll()](../facades/belich/resources).
