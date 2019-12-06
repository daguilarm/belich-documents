# Variables disponibles

A continuación se detallan todos las variables de configuración disponibles para un recurso.

### accessToResource

Esta variable, nos va a permitir deshabilitar el acceso a un recurso, y evitar por tanto, que esté disponible para navegación, aunque podremos utilizarlo para generar relaciones con otros recursos.

```php
/** @var bool */
public static $accessToResource = false;
```

Esta variable está activada por defecto, por lo que no es necesario añadirla.

### actions

**Belich** dispone de una serie de archivos `blade`, que están ubicados en la carpeta: `\resources\views\actions\`. En estos archivos se encuentran los botones de accion, que aparecerán en le `index` de los recursos:

```php
@can('view', $model)
    <a href="{{ Belich::actionRoute('show', $model) }}" class="action">@actionIcon('eye')</a>
@endcan

@can('update', $model)
    <a href="{{ Belich::actionRoute('edit', $model) }}" class="action">@actionIcon('edit')</a>
@endcan

@can('delete', $model)
    <a href="{{ Belich::actionRoute('destroy', $model) }}" class="action">@actionIcon('trash')</a>
@endcan
```

Por defecto, **Belich** accede al archivo `default.blade.php`, pero podemos crear (en dicha carpeta), nuestro propio archivo personalizado para ser utilizado en nuestro recurso, de forma, que podemos crear diferentes archivos para cada recurso.

Ahora, solo tenemos que indicarle a **Belich** que archivo utilizar en cada recurso:

```php
/** @var string */
public static $actions = 'newAction';
```

?>Solo utilizar esta variable, si deseamos cambiar el archivo por defecto.

### Controller actions 

A veces, necesitamos que un formulario envie la información a un controlador personalizado, en vez de usar el congrolador **CRUD** por defecto de **Belich**. Para ello, tendremos que indicar la ubicación del controlador, de la siguiente forma:

```php
/**
 * @var string
 */
public static $controllerAction = '\App\Http\Controllers\TestController';
```

**Belich**, automáticamente, añadirá a las vistas: `create` y `edit`, el método sobre el que actuar, por ejemplo, si nos encontramos en la vista `create`, automáticamente, inyectará a nuestro formulario, lo siguiente:

```html
<form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-create" id="form-responsecontrollers-create" action="{{ action('\App\Http\Controllers\TestController@create') }}">
```

Y en el caso de la vista `edit`:

```html
<form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-edit" id="form-responsecontrollers-edit" action="{{ action('\App\Http\Controllers\TestController@update') }}">
```

En resumen, una forma sencilla de utilizar nuestro propio Controlador, para resolver el formulario.

### displayInNavigation

Sirve para indicar si queremos que el recurso aparezca en los menus: tanto el superior como el lateral.

```php
/** @var bool */
public static $displayInNavigation = true;
```

Esta variable está activada por defecto, por lo que no es necesario añadirla.

### downloable

Sirve para indicar si el recurso puede ser exportado a los diferentes formatos disponibles.

```php
/** @var bool */
public static $downloable = true;
```

Esta variable está activada por defecto, por lo que no es necesario añadirla.

### group

Sirve para indicar que nuestro recurso, debe agruparse en un grupo determinado, creando un menu y su respectivo submenu en la navegación.

```php
/** @var string */
public static $group = 'My Group Name';
```

Si lo dejamos en blanco, se considerará el recurso como raiz, y no se le asignarán subniveles, quedando como a continuación (Resource 3):

```php
\Group1
    \Resource 1 
    \Resource 2
\Resource 3
```


### $icon

Podemos asociar nuestro recurso con un icono de [Font-Awesome](https://origin.fontawesome.com). Para ello, debemos hacer lo siguiente:

```php
/** @var string */
public static $icon = 'user-friends';
```

Simplemente debemos indicar el nombre que usa `fontawesome` para el icono.

?>Este valor esta desactivado por defecto, por lo que debemos indicarle el nombre del icono si queremos que se muestre.

$redirectTo = 'index, create, detail, edit';

### Nombre del recurso 

Para identificar el recurso, utilizamos etiquetas. Estas etiquetas son utilizadas por **Belich**, para referirse a el recurso en: menus, breadcrumbs, etc.

Existen dos tipos de etiquetas para identificar el recurso, la singular y la plural: `$label` y `$pluralLabel`.

```php
/** @var string */
public static $label = 'User';

/** @var string */
public static $pluralLabel = 'Users';
```

?>Si las dejamos en blanco, el sistema identificará el recurso con el nombre del archivo, y su versión en plural.

### model

Debemos indicarle a **Belich** qué modelo utilizar y donde está ubicado:

```php
/** @var string [Model path] */
public static $model = '\App\User';
```

!>Este campo es obligatorio

### redirectTo 

Después de realizar una acción, por ejemplo, crear un recurso. Podemos indicarle a **Belich** hacia donde queremos que redireccione.

```php
/** @var string */
public static $redirectTo = 'index';
```

Hay que indicarle la acción que queremos que resuelva. Las acciones disponibles son:

- **index**
- **show**
- **create** 
- **update**

?>Por defecto, Belich direccionará al index.

### relationships 

Para evitar problemas de N+1 en las consultas a la base de datos, y utilizar `eager loading`, debemos indicarle a **Belich** que relaciones debe añadir a la consulta a la base de datos que realizará el modelo.

```php
/** @var array */
public static $relationships = ['billing'];
```

### tableTextAlign 

Permite alinear la tabla del `index`, según nuestras necesidades. Por defecto, el valor es la alineación a la izquierda. Permite los valores: `left`, `center`, `right` y `justify`.

```php
/** @var string */
public static $tableTextAlign = 'center';
```

### softDeletes

Debemos indicarle a **Belich**, si nuestro modelo incluye `softdeletes`. Si es así, demos indicárselo de la siguiente forma:

```php
/** @var array */
public static $softDeletes = true;
```

?>Por defecto está desactivado.
