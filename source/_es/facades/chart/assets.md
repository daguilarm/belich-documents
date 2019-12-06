# Chart Facade: assets

El método para generar assets es:


```php
{!! Chart::assets('js') !!}
```

Podemos pasarle dos parámetros: `js` o `css`. En función del que seleccionemos, nos devolverá el código HTML5 para cargar la última versión de la librería para gráficas utilizada por Belich.

A modo de ejemplo:

```php
{{-- Load the css lib --}}
{!! Chart::assets('css') !!}

//Will render 
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
```

y su equivalente en `javascript`:

```php
{{-- Load the css lib --}}
{!! Chart::assets('js') !!}

//Will render 
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
```
