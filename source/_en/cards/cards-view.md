---
title: Cards views
description: Managing Card Views
extends: _layouts.documentation
section: content
locate: en
folder: cards
---

# Cards views

Once we have assigned the correct path for the *View* in the *Controller*, we can proceed as we would normally do with another view. To do this, **Belich** has a *Component for Blade*, which will help us to maintain the default format.

>Of course, we can not use the component, and use the view directly.

Let's look at the structure of the component for **Cards** which has **Belich** by default. Something as simple as this:

```php
<div id="cards-{{ $card->uriKey }}" class="{{ $card->width }} p-8 overflow-hidden shadow bg-{{ $background ?? 'white' }} border border-gray-200">
    {{ $content }}
</div>
```

So in our view, we will have to do something like this:

```php
//Direct version using Blade components
@component('belich::components.card')
    @slot('card', $card)
    @slot('content')
        <h1>Lorem</h1>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    @endslot
@endcomponent
```

**Belich** supports [BladeX](https://github.com/spatie/laravel-blade-x), so if we adapt the previous example:

```php
//Same example using BladeX (https://github.com/spatie/laravel-blade-x)
<belich::card :card="$card">
    <slot name="content">
        <h1>Lorem</h1>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </slot>
</belich::card>
```

>Both options are perfectly valid.

Of course, we can access the variables we have sent from the *Controller* (in the example shown in the chapter on [Controllers](cards-controller), the variables that were sent to the view, were: `$data1` and `$data2`). 

Using **Blade-X**:

```php
<belich::card :card="$card">
    <slot name="content">
        <h1>{{ $card->withMeta['data1'] }}</h1>
        <div>{{ $card->withMeta['data2'] }}</div>
    </slot>
</belich::card>
```

Using **Blade Components**:

```php
@component('belich::components.card')
    @slot('card', $card)
    @slot('content')
        <h1>{{ $card->withMeta['data1'] }}</h1>
        <div>{{ $card->withMeta['data2'] }}</div>
    </slot>
    @endslot
@endcomponent
```
