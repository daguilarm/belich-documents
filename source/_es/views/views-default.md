---
title: Vistas
description: Gestión de Vistas
extends: _layouts.documentation
section: content
locate: es
folder: views
---

# Vistas

En todas las vistas, tiene a su disponsición dos variables: `$request` y `$resources`. Estas variables, le van a ser de utilidad a la hora de personalizar sus vistas.

Empecemos hablando de cada una de ellas por separado:

### request

Es la variable enviada a las vistas desde el controlador. En función de la vista, dispondrá de más o menos información.

El acceso a los parámetros de la variable `$request`, se hace como si fuera un objecto:

```php
$request->actions
```

Los parámetros que soporta `$request` (y que estarán disponibles en función de la vista), son:

- **actions**: Indica que archivo debe cargarse para generar los botones de acción en la vista `index`. Pueden configurarse en cada recurso.

- **autorizedModel**: Nos devuelve el modelo actual para ser utilizado por los mecanismos de autorización de **Laravel**.

Por ejemplo, en una de nuestras vistas, podemos hacer los siguiente:

```php
@can('create', $request->autorizedModel)
    <button class="btn btn-primary">Create</button>
@endcan
```

- **breadcrumbs**: Contiene la información necesaria para generar los breadcrumbs. También puede personalizarse.

- **fields**: Incluye todos los campos de formulario del recurso.

- **name**: Devuelve el nombre del recurso actual.

- **results**: La respuesta de la base de datos para el controlador actual. Nos servirá para mostrar los resultados.

- **total**: Es el número de columnas que tiene la tabla que se genera en la vista: `index`.

- **id**: Según la vista, será el `ID` del recurso actual. Se puede acceder a él directamente mediante `Belich::resourceId()`.

### resources

Es el listado de todos los recursos que tenemos en Belich. Sirve para generar el menu y la barra lateral.

Nos da acceso a la lista completa de recursos y sus propiedades. Básicamente, es el resultado de la inyección en la vista de [Belich::resourcesAll()](../facades/belich/resources).
