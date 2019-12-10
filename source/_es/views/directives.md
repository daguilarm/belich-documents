# Directivas para Blade

**Belich** incluye, una serie de directivas para `Blade`, para facilitar la integración del package en `Blade`.

### icon

Esta directiva, nos permite añadir un icono de [Fontawesome](https://origin.fontawesome.com/) de forma rápida. A modo de ejemplo:

```php
@icon('edit')
```

Nos devolverá:

```php
<i class="fas fa-edit"></i>
```

Podemos añadir un segundo parámetro opcional, con un texto. Por ejemplo:

```php
@icon('edit', 'Edit text')
```

Nos devolverá:

```php
<i class="fas fa-edit mr-2"></i>Edit text
```

Al añadir el texto, automáticamente añade `mr-2` para crear una separación entre el texto y el icono.

>Se puede añadir un texto de un archivo de idioma, para ello, debe hacer así `@icon('edit', 'belich::file.fileText')`. El sistema automáticamente añadirá el texto dentro de el helper `trans()`.

También puede utilizarse como `helper`, usando la siguiente sintaxis:

```php
Helper::icon('edit', 'Edit text')  
Helper::icon('edit', 'belich::file.fileText')
```

Puede personalizarse el aspecto, a través de la clase css `.icon`.

### actionIcon

Igual que `@icon`, pero no acepta texto. Pensado para los iconos de los botones de acción del `index`.


### hasSoftdelete

Verifica si un modelo tiene el trait *softdelete*. 

Es una lo que Laravel denomina *Custom If Statements
*, por lo tanto, funciona como si fuera una directiva `@if`.

```php
@hasSoftdelete($model)  
    //Staff
@endif
```


### hasSoftdeletedResults

Igual que el anterior, pero esta vez, verifica si el valor actual del modelo esta eliminado o no (con softdelete).

Es un helper para ser utilizado con los botones de acción del `index`.

Por ejemplo, si queremos saber si el valor actual ha sido eliminado o no, para poder mostrar el icono de restaurar item o el de eliminar item...


### mix

Ideal para crear un enlace de hoja de estilos o de javascript. Está pensado para cuando queremos llamar un archivo **JS** o **CSS** dentro de la carpeta `vendor/belich`. 

La sintaxis será:

```php
@mix('app.js')
```

Generando el código:

```php
<script src="{{ mix('app.js', 'vendor/belich') }}"></script>
```

Que a su vez, se renderizará en:

```php
<script src="/vendor/belich/app.js?id=bfc1e2cb4216d35a1a8d"></script>
```

La directiva, buscará la extensión del archivo (.js o .css) y en función de cual sea, renderizará el código de una forma u otra.

### trans

Al igual que la directiva `@mix()`, está pensada para cargar el archivo de idioma de la carpeta  `vendor/belich`. 

La sintaxis será:

```php
@trans('file.fileName')
```

Generando el código:

```php
{{ trans('belich::file.fileName') }}
```

Por lo que `@trans('file.fileName')` será equivalente a `@lang('belich:file.fileName')`.
