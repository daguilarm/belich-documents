---
title: Personalización
description: Gestionando la personalización con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Personalización

**Belich**, permite un alto grado de personalización. Por ello, la mayoría de las *Vistas*, están disponibles para ser modificadas por el usuario, permitiendo adaptarlas a nuestras necesiades.

La idea de **Belich**, es la de ser un sistema flexible, y no un soporte rígido. A diferencia de otros entornos similares, la idea siempre ha sido, que sea **Belich** el que se adapte a nosotros, y no al contrario. 

Esta ha sido, y será la idea sobre la que sea ha desarrollado este *package*.

## Vistas genéricas

En la carpeta `./resources/views/vendor/belich/partials/` se encontrá la vista:

- `messages.blade.php`

Donde podrá personalizar los mensajes o alertas de **Belich**. También encontrará, cuatro carpetas:

- `buttons`
- `footer`
- `headers`
- `navigation`

### Buttons 

Aquí encontrará los tres botones correspondientes a las opciones disponibles por defecto en la vista `index` de **Belich**. Estas opciones son:

- Borrar archivos de forma masiva, una vez seleccionados.
- Descargar la tabla en el formato preferido.
- Configurar las opciones de visualización.

En la carpeta `./resources/views/vendor/belich/partials/buttons` encontrá las vistas:

- `delete.blade.php`
- `exports.blade.php`
- `options.blade.php` 

Correspondientes a los botones ubicados en la vista: `index`:

![Buttons example](../../assets/images/buttons.jpg)
<div id="legend"><b>fig 1</b>: Ejemplo de botones</div>

Podemos añadir todos los botones que queramos en el archivo: `./resources/views/vendor/belich/dashboard/index/search`. Actualmente, tiene este aspecto:

```php
//Dropdowns options
@include('belich::partials.buttons.options')

//Show or hide base on selected items
//Dropdowns export
@includeWhen(Belich::downloable(), 'belich::partials.buttons.exports')

//Dropdown mass delete
@can('delete', $request->autorizedModel)
    @include('belich::partials.buttons.delete')
@endcan
```

### Footer 

Aquí encontraremos dos archivos:

- `content.blade.php` 
- `javascript.blade.php`

El archivo `content.blade.php`, es propiamente el `footer` de **Belich**. Por lo que podemos configurarlo como queramos. Por defecto, lleva un código minimalista, básicamente, con los créditos. 

<div class="blockquote-alert">
    Por favor, <strong>Belich</strong> es un producto de código libre y que supone de un gran trabajo y esfuerzo personal, por lo que requiere de reconocimiento del autor. No borres los créditos.
</div>

El archivo `javascript.blade.php` contiene todo el código `javascript` que utiliza el *package*. 

>Es aquí donde debes añadir tus propios scripts.

### Headers 

Aqui se encuentra ubicado todo el código ubicado en el `head` de una web. Se encuentran los archivos:

- `default.blade.php` 
- `metatags.blade.php` 
- `styles.blade.php` 

El archivo `default.blade.php` es el mero contendor de todo. El archivo `metatags.blade.php`, contiene todas las etiquetas *metatags*, por defecto incluye lo básico, por lo que puedes añadir y configurarlo a tu gusto.

Por último, el archivo `styles.blade.php`, que incluye todo el código `css` de **Belich**.

### Navegación

En la carpeta `./resources/views/vendor/belich/partials/navigation` encontrá las vistas:

- `breadcrumbs.blade.php`
- `logout.blade.php`
- `navbar.blade.php` 
- `sidebar.blade.php` 

Donde podremos cambiar y personalizar el código de:

- Los **breadcrumbs**, desde el archivo `breadcrumbs.blade.php`.
- La **barra de navegación superior**: `navbar.blade.php`.
- La **barra de navegación lateral**: `sidebar.blade.php`.
- Y en la barra de navegación superior, la parte del **logout y el perfil**: `logout.blade.php`.

>Para cambiar entre navegación lateral y superior, hay que hacerlo desde el archivo `\config\belich.php`

## CRUD

En la carpeta `./resources/views/vendor/belich/dashboard` encontrá las vistas:

- `create.blade.php`
- `edit.blade.php`
- `index.blade.php` 
- `show.blade.php` 

Junto con las carpetas:

- `index`
- `javascript` 

Donde se guardan las vistas parciales del `dashboard`. En la carpeta `index`, se encuentran los archivos:

- `pagination.blade.php`
- `search.blade.php` 
- `table.blade.php` 

Donde se puede configurar completamente la vista: `index`. Y en la carpeta `javascript`, encontraremos el código *javascript* de cada vista.
