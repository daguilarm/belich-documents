---
title: Belich facades - Resources
description: Managing Belich's facades to get all the available information about a resource
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich facades: Resources

#### accessToResource()

It will return `true` or` false`, to know if the current resource can be accessed directly by system users.

#### currentResource()

It returns the information of the current resource, through a collection. The data it offers are:

- **name**: The name of the pluralized and lowercase class, using the method `routeResource()`.
- **controllerAction**: It shows us the action that is taking place in the *Controller*, using the method `routeAction()`.
- **fields**: Collection with all updated form values (request values).
- **results**: Collection with all the results of the database for the resource. If we are in the index view, it will return a resource list, while if we are in the views: `show` or` edit`, it will return the value for that resource based on its ID, and if we are in `create`, it will be an empty instance of the model.
- **values**: It returns a collection with the following values:

    + **class**: class name.                 
    + **displayInNavigation**: bool.
    + **group**: name of the group to which the resource belongs (if applicable).        
    + **icon**: icon (if applicable).                 
    + **hideMetricsForScreens**: array with the screen sizes to hide.
    + **label**: sigular label.                 
    + **pluralLabel**: plural label.               
    + **resource**: resource name, lowercase and plural.             

#### downloable()

It will return `true` or` false`, to know if the current resource can be exported.

#### redirectTo()

It tells us the redirection path, after an action: create, update, delete, ...

#### resource()

This method returns the second term of the route. The one that belongs to the current resource.

For example, if the current route is: `dashboard.users.index`, it will return` users`.

#### resourcesAll()

It returns the complete list of resources found in the directory: `\ App \ Belich \ Resources \`, returning a collection with the attributes of each resource.

They are the same that are obtained from the method: `currentResource()`.

#### resourceClassPath($className = null)

Same as `resourceName ()` but with the full path of the class: `\App\Belich\Resources\User`.

If we leave the `$className` variable, the method will return the current class.

We can add a custom class name, and it will return the full class path.

#### resourceName()

It returns the name of the current class. For example: `User`.

#### resourceId()

In the actions `edit` and` show`, it will show us the ID of the current resource. In the rest, it will return the value: `null`.

#### resourceUrl()

It returns the complete url from a resource. For example, if we are in the resource: `User`, it will return us: `http://url.com/dashboard/users`.


