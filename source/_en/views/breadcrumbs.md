---
title: Breadcrumbs
description: Managing Breadcrumbs
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Breadcrumbs

The *breadcrumbs* can be configured from the view located in `resources/views/vendor/belich/partials/navigation/breadcrumbs.blade.php`. 

The basic template has the following format:

```php
{{-- Customize your breadcrumbs --}}
<nav class="w-full rounded-lg rounded-b-none shadow bg-white">
    <ul class="flex list-reset my-3 p-4 font-semibold">
        @foreach($request->breadcrumbs as $label => $url)
            {{-- Links --}}
            @if($label && $url)
                <li>
                    <a href="{{ $url }}" class="text-teal-dark font-medium underline">{{ $label }}</a>
                </li>

            {{-- Current --}}
            @else
                <li class="text-grey-darker">{{ $label }}</li>
            @endif

            {{-- Set separator --}}
            @if(!$loop->last)
                <li class="mx-2">/</li>
            @endif
        @endforeach
    </ul>
</nav>
```

### Create a custom breadcrumb for a resource

Simply open the resource file (for example: *User*), located at: `\App\Belich \Resources\User.php`, and in it, you can add a method to customize the *breadcrumb*.

As an example:

```php
/**
 * Set the breadcrumbs for the given resource.
 *
 * @return array
 */
public static function breadcrumbs()
{
    return [
        'text1' => 'http://url1.com',
        'text2' => 'http://url2.com',
        'text3',
    ];
}
```

The previous example shows a *breadcrumb* with the texts and links indicated.

If you look closely, the last element in the array does not have an *url*, that is because it is the current page... in any case, you are free to add an *url* if you wish, but: **Does it make sense to put a link in the current page?**
