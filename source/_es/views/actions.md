---
title: Botones de acción en vistas
description: Gestionando botones de acción en las vistas
extends: _layouts.documentation
section: content
locate: es
folder: views
---

# Acciones

Las acciones, son los botones con opciones que aparecen en la vista `index` y que nos permiten: *ver*, *editar* y *borrar* cada item de cada recurso.

Por defecto, el sistema soporta los tres métodos expuestos anteriormente. Durante la instalación de **Belich**, se generó automáticamente una carpeta llamada `actions`, en la ruta:

`resources/views/vendor/belich/actions/default.blade.php`

Este archivo contiene las tres acciones básicas:

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

>No modifique este archivo. Si quiere personalizarlo, cree un archivo nuevo y haga en él las modificaciones.

Si queremos que nuestro recurso utilice el nuevo archivo (personalizado), sólo tenemos que sobreescribir la variable `$actions` del recurso:

```php
/** @var string */
public static $actions = 'newActionFile';
```

>*Belich* buscará directamente en la carpeta de acciones, por lo que no hay que indicar la ruta. ¡Recuerde añadir su archivo allí!.

Al hacer esto, indicamos al sistema que utilice el archivo:

`resources/views/vendor/belich/actions/newActionFile.blade.php`

Si el archivo no existe, el sistema cargará el archivo por defecto.

>La variable `$data`, será automáticamente inyectada en la vista, por lo que podrá utilizar los datos directamente en su archivo personalizado.
