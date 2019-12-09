---
title: Belich facades - Chart assets
description: Managing the belich facades to optimize graphic assets
extends: _layouts.documentation
section: content
locate: en
folder: facades/chart
---

# Chart Facade: assets

The method to generate *assets* is:

```php
{!! Chart::assets('js') !!}
```

We can pass two parameters: `js` or` css`. Depending on which one we select, it will return the `HTML5` code to load the latest version of the library for graphs used by **Belich**.

As an example:

```php
{!! Chart::assets('css') !!}
```

Will return:

```html
//Will render 
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
```

And its equivalent in `javascript`:

```php
{!! Chart::assets('js') !!}
```

Will return:

```html
//Will render 
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
```
