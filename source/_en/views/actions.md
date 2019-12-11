---
title: Action buttons in views
description: Managing action buttons in views
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Action buttons

The actions are the buttons with options that appear in the `index` view and that allow us to: *see*, *edit* or *delete* each item from the resources.

By default, the system supports the three methods described above. During the installation of **Belich**, a folder called `actions` was automatically generated, in the path:

`resources/views/vendor/belich/actions/default.blade.php`

This file contains the three basic actions:

```php
<a href="{{ Utils::route('show', $data) }}" class="action">
    {!! Utils::icon('eye') !!}
</a>
<a href="{{ Utils::route('edit', $data) }}" class="action">
    {!! Utils::icon('edit') !!}
</a>
<a href="{{ Utils::route('destroy', $data) }}" class="action">
    {!! Utils::icon('trash') !!}
</a>
```

>Do not modify this file. If you want to customize it, create a new file and make the changes to it.

If you want a resource to use the new (custom) file, we just have to overwrite the variable `$actions` in the resource:

```php
/** @var string */
public static $actions = 'newActionFile';
```

>*Belich* will search directly in the actions folder, so you don't have to indicate the route. Remember to add your file in this folder!

By doing this, we instruct the system to use the file:

`resources/views/vendor/belich/actions/newActionFile.blade.php`

If the file does not exist, the system will load the default file.

>The variable `$data`, will be automatically injected into the view, so you can use the data directly in your custom file.
