---
title: Customization
description: Managing personalization with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Customization

**Belich**, allows a high degree of customization. Therefore, most of the *Views* are available to be modified by the users, allowing them to adapt to their needs.

The idea of **Belich**, is to be a flexible system, and not a rigid one. Unlike other similar systems, the idea has always been, let **Belich** that suits us, and not vice versa.

This has been, and will be the idea on which this *package* has been developed.

## Vistas genéricas

In the folder `./resources/views/vendor/belich/partials/` you will find the view:

- `messages.blade.php`

Where you can customize the messages or alerts of **Belich**. You will also find four folders:

- `buttons`
- `footer`
- `headers`
- `navigation`

### Buttons 

Here you will find the three buttons corresponding to the options available by default in the `index` view of **Belich**. These options are:

- Delete files in bulk, once selected.
- Download the table in the preferred format.
- Configure the displayed options.

In the folder `./resources/views/vendor/belich/partials/buttons`, you will find the *Views*:

- `delete.blade.php`
- `exports.blade.php`
- `options.blade.php` 

Corresponding to the buttons located in the view: `index`:

![Buttons example](../../assets/images/buttons.jpg)
<div id="legend"><b>fig 1</b>: Example of buttons</div>

We can add all the buttons we want in the file: `./resources/views/vendor/belich/dashboard/index/search`. Currently, it looks like this:

```php
//Dropdowns options
@include('belich::partials.buttons.options')

//Show or hide base on selected items
//Dropdowns export
@includeWhen(Belich::downloable(), 'belich::partials.buttons.exports')

//Dropdown mass delete
@can('delete', $request->autorizedModel)
    @include('belich::partials.buttons.delete')
@endcan
```

### Footer 

Here we will find two files:

- `content.blade.php` 
- `javascript.blade.php`

The file `content.blade.php`, is the *footer* of **Belich**. So we can configure it as we want. By default, it carries a minimalist code, basically, with the credits.

<div class="blockquote-alert">
    Please, <strong>Belich</strong> is a product base in free code and that supposes a lot of work and personal effort, reason why it requires recognition of the author. Do not delete the credits.
</div>

The file `javascript.blade.php` contains all the `javascript` code that use the *package*. 

>This is where you must add your own scripts.

### Headers 

Here you can find all the code located in the `head` of a website. The files are:

- `default.blade.php` 
- `metatags.blade.php` 
- `styles.blade.php` 

The file `default.blade.php` It is the mere container of everything. The file `metatags.blade.php`, contains all the *metatags* tags, by default it includes the basics, so you can add and configure it to your needs.

Finally, the file `styles.blade.php`, which includes all the `css` code of **Belich**.

### Navigation

In the folder `./resources/views/vendor/belich/partials/navigation` you will find the views:

- `breadcrumbs.blade.php`
- `logout.blade.php`
- `navbar.blade.php` 
- `sidebar.blade.php` 

Where we can change and customize the code of:

- The **breadcrumbs**, in the file `breadcrumbs.blade.php`.
- The **top navigation bar**: `navbar.blade.php`.
- The **side navigation bar**: `sidebar.blade.php`.
- And in the top navigation bar, the components of the **logout and the profile**: `logout.blade.php`.

>To switch between side and top navigation, you have to do it from the file `\config\belich.php`

## CRUD

In the folder `./resources/views/vendor/belich/dashboard` you will find the views:

- `create.blade.php`
- `edit.blade.php`
- `index.blade.php` 
- `show.blade.php` 

Along with the folders:

- `index`
- `javascript` 

Where the partial views of the dashboard are saved. In the `index` folder, you will find the files:

- `pagination.blade.php`
- `search.blade.php` 
- `table.blade.php` 

Where the `index` view can be completely configured. And in the `javascript` folder, you will find the all * ¡javascript* code of each view.
