# Belich Facade: Blade

En esta sección, encontraremos métodos para renderizar código HTML.

## Métodos para Blade (generando HTML)

También podemos generar helpers especializados para nuestras plantillas Blade. 

A veces necesitamos generar código HTML en Blade, y no queremos añadir código PHP a nuestro template. Para ello, se han desarrollado algunos helpers para ser utilizados de forma directa.

Normalmente, estos métodos son utilizados por el sistema, pero pueden ser útiles para desarrollar módulos propios, nuevos campos de formulario o packages, en cualquier caso, sirvan o no, aquí están disponibles para su uso.

La sintaxis para utilizar estos helpers será:

```php
Belich::html()->method()
```

?>Si olvidamos añadir el método `blade()`, dará error.

Los métodos soportados son:


#### resolve()

Modifica el valor de un campo al mostrarlo en la vista. Se utiliza, cuando este campo tiene una relación (relationship), o utiliza los métodos `displayUsing` o `resolveUsing`. 

Utiliza la siguiente sintaxis:

```php
Belich::html()->resolve($field, $model)
```

Es utilizado por el sistema en las vistas `index` y `show`.

#### resolveSoftdeleting()

Hace lo mismo que el anterior, pero añade la etiqueta `del` a la columna, para indicar que una fila ha sido borrada (softdeleting) y la estamos viendo porque tenemos permisos para ello, pero se encuentra eliminada para el resto de usuarios.


```php
Belich::html()->resolveSoftdeleting($field, $model)
```

?>Si optamos por este método en vez de `resolve()`, no debemos añadir el html de la columna: `<td></td>`, ya que el sistema lo genera automáticamente para añadirle los estilos. 

