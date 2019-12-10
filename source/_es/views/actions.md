# Acciones

Las acciones, son los botones con opciones que aparecen en la vista `index` y que nos permiten: ver, editar y borrar cada item de cada recurso.

Por defecto, el sistema soporta los tres métodos expuestos anteriormente. Al instalar belich, se generó automáticamente una carpeta llamada `actions`, en la ruta:

`resources/views/vendor/belich/actions/default.blade.php`

Este archivo contiene las acciones básicas, y tiene el siguiente código:

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

Para configurar este nuevo archivo para que lo use un recurso, sólo tenemos que sobreescribir la variable `$actions` de nuestro recurso:

```php
/** @var string */
public static $actions = 'newActionFile';
```

Al hacer esto, indicamos al sistema que utilice el archivo:

`resources/views/vendor/belich/actions/newActionFile.blade.php`

Si el archivo no existe, el sistema cargará el archivo por defecto.

>La variable `$data`, será automáticamente incluida en la vista, por lo que podrá utilizar los datos directamente en su archivo personalizado.
