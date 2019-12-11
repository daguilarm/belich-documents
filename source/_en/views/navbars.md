---
title: Navigation bar
description: Managing the Belich Navigation Bar
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Navigation bar

Automatically, **Belich** generates the file: `App\Belich\Navbar.php`. This file is the one that generates the navigation menu.

By default, **Belich** configure the menu, based on the resources added to the folder: `App\Belich\Resources`.

To group the resources, we will use the variable `$group`, which we must add to our resource, as follows:

```php
/** @var string [Model path] */
public static $model = '\App\Models\Billing';

/** @var bool */
public static $displayInNavigation = true;

/** @var string */
public static $group = 'Billing';

/** @var string */
public static $label = 'Invoice';

/** @var string */
public static $pluralLabel = 'Invoices';
```

The previous example shows how the configure the variables of a resource.

All, the resources that share the variable `$group`, will be grouped in the same drop-down menu.

Navigation menus can be configured from the view located in `resources/views/vendor/belich/partials/navigation/navbar.blade.php`. 

The default code used by **Belich** is:

```php
{{-- This section is segregate in case you want to customize --}}
<nav id="navbar" class="h-16 {{ config('belich.navbar') === 'top' ? 'bg-teal-light' : 'bg-white' }}">
    {{-- Top navbar --}}
    <ul>
        {{-- Logo --}}
        <li class="bg-teal-dark">
            <a class="text-white w-48" href="{{ Belich::url() }}">{{ Belich::name() }}</a>
        </li>

        {{-- Top navbar --}}
        @if(config('belich.navbar') === 'top')
            {{-- Get all the resources --}}
            @foreach(Belich::getGroupResources() as $resource)

                {{-- One level resource --}}
                @if($resource->count() <= 1)
                    <li class="hover:bg-teal">
                        <a class="text-white" href="{{ sprintf('%s/%s', Belich::url(), $resource->first()->get('resource')) }}">
                            {{ $resource->first()->get('name') }}
                        </a>
                    </li>

                {{-- two level resource --}}
                @else
                    <li class="hover:bg-teal">
                        <a class="text-white" href="{{ sprintf('%s/%s', Belich::url(), $resource->first()->get('resource')) }}">
                            {{ $resource->first()->get('group') }}
                            <i class="fas fa-caret-down ml-1 icon"></i>
                        </a>
                        <ul>
                            @foreach($resource as $item)
                                <li class="bg-teal-light hover:bg-teal-lighter">
                                    <a class="text-white hover:text-teal-dark" href="{{ sprintf('%s/%s', Belich::url(), $item->get('resource')) }}">
                                        {{ $item->get('name') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        @endif

        {{-- Logout --}}
        <li class="float-right">
            @include('belich::partials.navigation.logout')
        </li>
    </ul>
</nav>
```

Feel free to change and configure it according to your needs.
