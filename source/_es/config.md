# Archivo de configuración

El archivo de configuración, se genera en la carpeta de configuración de Laravel: `\config\belich.php`.

En este archivo, vamos a poder configurar **Belich** de forma sencillar y rápida. Dispone de diferentes apartados, que vamos a ir viendo uno a uno.

### Configuración de la aplicación

- **name**: El nombre de la aplicación. Por defecto:`Belich Dashboard`.
- **path**: La ruta desde la que se accederá a Belich. Por defector: `dashboard/.
- **url**: Url donde está ubicado **Belich**. Por defecto:`/`.
- **profile**: Campo boleano, que nos permite activar o desactivar el recurso `\App\Belich\Resources\Profile.php`. 

Al hacer esto, eliminamos las referencias en el código a este archivo, pero en la barra de navegación, se seguirá visualizando. Para eliminarlo, tenemos dos opciones:

1. Eliminar el archivo `\App\Belich\Resources\Profile.php`. No recomendada, siempre es mejor desactivar a eliminar...
2. Desactivar la visualización del recurso en la barra de navegación. Para ello, en el archivo `\App\Belich\Resources\Profile.php`, buscaremos la propiedad `public static $displayInNavigation` y la desactivaremos:

```php
/** @var bool */
public static $displayInNavigation = false;
```

### Navegación

Belich, ofrece dos formas de navegación, mediante barra superior o lateral.

- **navbar**: admite dos opciones `top` o `sidebar`.

```php
'navbar' => 'top',
```

La opción por defecto, es `top`. En ella se prescinde de la barra lateral, y los recursos son mostrados en la barra superior. Es una opción indicada cuando vamos a mostrar grandes tablas con muchos datos.

La opción `sidebar`, nos ofrece los recursos en la barra lateral, y deja la bara superior para mostrar la configuración de usuario y el fin de sesión.

También podemos definir un icono por defecto en nuestra barra de navegación, utilizando el campo: 

```php
'defaultIcon' => 'caret-right',
```

?>**Belich** utiliza [Font-awesome](https://origin.fontawesome.com/icons?d=gallery), por lo que solo tendrás que añadir el nombre del icono, tal y como se muestra en la página.

### Middleware

Podemos configurar el middleware según nuestras necesidades. Por defecto, se utilizan:

- **https**: middleware para garantizar que siempre se utiliza una url segura. Esta opción, es optativa y puede eliminarse sin mayor problema.
- **web**: carga una buena parte del middleware que ofrece por defecto Laravel. Eliminar solo si se sabe que se está haciendo.
- **auth**: autentificación por defecto de Laravel. Eliminar solo si se sabe que se está haciendo.

Para añadir middleware personalizado, solo tenemos que añadirlo al array:

```php
'middleware' => [
    'https',
    'web',
    'auth',
    'customMiddelware1',
    'customMiddelware2',
    ...
],
```

### Exportar archivo

Selección del driver de exportación de bases de datos a archivos. Desde aquí, podrá configurar que driver utilizará Belich para generar archivos `XLS`, `XLSX` o `CSV`, a partir de la base de datos.

Seleccione el driver que prefiera, a partir de la lista suministrada:

```php
'export' => [
    'driver' => 'fast-excel',
],
```

### Parámetros permitidos en la URL 

Belich, limita los parámetros que pueden ser enviados por la URL, y por tanto, ser utilizados por la aplicación. Si añadimos parámetros a la URL, Belich automáticamente los eliminará, por lo tanto, si queremos añadir parámetros nuevos, tendremos que hacerlo a traves del campo `allowedUrlParameters`.

Por defecto, tiene este aspecto:

```php
'allowedUrlParameters' => []
```

Es decir, sólo utiliza los parámetros por defecto de Belich. Si queremos añadir nuestros propios parámetros, tendremos que hacerlo de la siguiente forma:

```php
'allowedUrlParameters' => ['param1', 'param2',...]
```

### Minimizar el HTML de la aplicación

Belich utiliza un `middleware` para comprimir el código HTML de la aplicación, antes de ser cacheado por Laravel. Este proceso, aporta una disminución del tamaño del web. Esta disminución de tamaño, suelo estar en torno al 25%, aunque es variable, y dependerá de las características de cada proyecto.

Por defecto, esta opción se encuentra activada, pero puede desactivarse de forma sencilla:

```php
'minifyHtml' => [
    'enable' => false,
]
```

Puede suceder que este `middleware` afecte a otras partes del proyecto, propiciando que no funcione correctamente. 

Por ejemplo, para evitar problemas con la exportación de archivos, se ha deshabilitado en todas las rutas que Belich utiliza para exportar archivos. A partir de esta situación (problemas con el `middleware` y las descargas), se decidió permitir la configuración de rutas que estuvieran excluidas de este `middleware`.

Se puede hacer de dos formas:

1. Indicando que acciones quremos excluir del `middleware`:

```php
'minifyHtml' => [
    'enable'    => true,
    'except'  => [
        'actions' => ['index', 'show'],
        'paths'   => [],
    ],
],
```

2. Indicando las urls que queremos excluir:

```php
'minifyHtml' => [
    'enable'    => true,
    'except'  => [
        'actions' => [],
        'paths'   => ['dashboard/users'],
    ],
],
```

?>No es necesario preocuparse por si nuestra ruta empieza o termina con `/`. Belich las elimina de forma automática para hacer la comprobación.

### Eliminar Componentes (Gráficas y Cards) según el tamaño de pantalla

Podemos indicarle a Belich, que no queremos mostrar `cards` o `metrics` en dispositivos grandes, para ello, haremos lo siguiente:

```php
'hideComponentsForScreens' => ['lg'],
```

Los valores soportados son:

- **sm**: a partir de 576px.
- **md**: a partir de 768px.
- **lg**: a partir de 992px.
- **xl**: a partir de 1200px.

### Formato de fecha

Podemos definir el formato en el que queremos mostrar las fecha en la aplicación. 

Este valor, se utilizará en los campos de formulario `Date`. Estos campos devolverán el valor en las vistas: `index` y `show`, conforme a lo que definamos:

```php
/*
|--------------------------------------------------------------------------
| Date format
|--------------------------------------------------------------------------
|
| Define the default date format. This format will be use in the Controller actions: index and show.
*/
'dateFormat' => 'd/m/Y',
```

Nos devolverá (por ejemplo):

~~~
30/12/2018
~~~

### Paginación de resultados 

Podemos usar los dos tipos de paginación que tiene **Laravel** por defecto: 

- Links (link)
- Simple pagination (simple)

Para ello, disponemos de la variable `pagination`:

```php
/*
|--------------------------------------------------------------------------
| Pagination
|--------------------------------------------------------------------------
|
| Define the paginate style. Two styles available: link or simple
*/
'pagination' => 'link',
```


### Utilizar live search (búsqueda en tiempo real) en el `index` de Belich

El campo `enable` nos permite activar la busqueda o eliminarla de las vistas de Belich.

El campo `minChars`, determina el número mínimo de caracteres necesarios para que se realice la búsqueda.

```php
'liveSearch' => [
    'enable' => true,
    'minChars' => 2,
],
```

### Configurar la reducción de caracteres de los campos textArea

Este campo nos permite limitar el texto que se muestra en los campos de formulario: `textarea`, limitándolo al número de caracteres que configuremos.

```php
'textAreaChars' => 25,
```

### Cargando...

Podemos definir el icono o imagen que se verá cuando estemos cargado páginas o partes de página mediante ajax. Podemos definirlo en:

```php
/*
|--------------------------------------------------------------------------
| Loading status
|--------------------------------------------------------------------------
|
| Show the loading icon for ajax queries
*/
'loading' => '<i class="fas fa-spinner fa-spin fa-10x text-blue-200"></i>',
```
