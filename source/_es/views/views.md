# Vistas

En todas las vistas, tiene a su disponsición dos variables: `$request` y `$resources`. Estas variables, le van a ser de utilidad a la hora de personalizar sus vistas.

Empecemos hablando de cada una de ellas por separado:

### request

Es la variable enviada desde el controlador a las vistas. En función de la vista, dispondrá de más o menos información, ya que esta va variando en función de las necesidades de cada vista.

El acceso a los parámetros de la variable `$request`, se hace como si fuera un objecto:

```php
$request->actions
```

Los parámetros que soporta `$request` (y que dependerá de la vista que estén o no disponibles), son:

- **actions**: Indica que archivo de acciones debe cargarse para generar los botones de acción, en el `index`. Pueden configurarse en el Recurso.

- **autorizedModel**: Nos devolve el modelo actual para ser utilizado con los mecanismos de autorización de Laravel.

Por ejemplo, en una de nuestras vistas, podemos hacer los siguiente:

```php
@can('create', $request->autorizedModel)
    <button class="btn btn-primary">Create</button>
@endcan
```

- **breadcrumbs**: Similar a `$request->actions`, pero para los breadcrumbs. También puede personalizarse.

- **fields**: incluye todas las variables de configuración del los campos de formulario.

- **name**: el nombre del recurso actual.

- **results**: la respuesta de la base de datos para el controlador actual. Nos servirá para mostrar los resultados.

- **total**: es el número de columnas de la table que se genera en el `index`.

- **id**: según la vista, será el `ID` del recurso actual. Se puede acceder a él directamente mediante `Belich::resourceId()`.

### resources

Es el listado de todos los recursos que tenemos en Belich. Sirve para generar el menu y la barra lateral.

Nos da acceso a la lista completa de recursos y sus propiedades. Básicamente, es el resultado de la inyección en la vista de [Belich::resourcesAll()](/es/facades/resources).
