---
title: Fachadas (facades) de belich - Chart assets
description: Gestionando fachadas de belich para optimizar los assets de las gráficas
extends: _layouts.documentation
section: content
locate: es
folder: facades/chart
---

# Chart Facade: assets

El método para generar *assets* es:

```php
{!! Chart::assets('js') !!}
```

Podemos pasarle dos parámetros: `js` o `css`. En función del que seleccionemos, nos devolverá el código `HTML5` para cargar la última versión de la librería para gráficas utilizada por **Belich**.

A modo de ejemplo:

```php
{!! Chart::assets('css') !!}
```

Devolverá:

```html
//Will render 
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
```

Y su equivalente en `javascript`:

```php
{!! Chart::assets('js') !!}
```

Devolverá:

```html
//Will render 
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
```
