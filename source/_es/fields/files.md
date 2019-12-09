---
title: Gestión de campos de archivo o imagen
description: Gestión de campos de formulario para archivos o imagenes
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Gestión de campos de archivo o imagen

Los campos soportados por **Belich**, son:

- `File`
- `Image`

### Campo File 

Nos permite gestionar archivos, y ser almacenados en nuestro disco.

Veamos un ejemplo:

```php
use Daguilarm\Belich\Fields\Types\File;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        File::make('Excel file', 'excel')
            ->disk('myDisk'),
    ];
}
```

Podemos utilizar los siguientes métodos:

- `disk()`, nos permitirá modificar el disco de almacenamiento, según nuestras necesidades.
- `link()`, genera un link de descarga directo en las vistas: `index` y `show`.
- `storeName($tableName)`, guarda en la base de datos el nombre original del archivo, en el campo que asignamos a través de la variable: `$tableName`.
- `storeSize($tableName)`, guarda en la base de datos el tamaño del archivo, en el campo que asignamos a través de la variable: `$tableName`.
- `storeMime($tableName)`, guarda en la base de datos el tipo MIME del archivo, en el campo que asignamos a través de la variable: `$tableName`.
- `multiple()`, permite añadir multiples archivos desde un solo campo.

>Importante: debemos crear en nuestra base de datos, los campos necesarios para guardar los valores de los métodos anteriormente comentados.

### Campo Image 

Idéntico que el campo file, pero con la particularidad, de que en las vistas `index` y `show`, renderizará la imagen en `html` si así lo queremos.

```php
use Daguilarm\Belich\Fields\Types\Image;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        Image::make('My avatar', 'avatar')
            ->disk('myImages'),
    ];
}
```

Dispone de los siguientes métodos própios (a parte de los anteriormente citados):

- `alt()`: Este método nos permitirá añadir la etiqueta `alt` a nuestra imagen.
- `asHtml()`: Renderizará la imagen en las vistas: `index` y `show`.

A modo de ejemplo:

```php
use Daguilarm\Belich\Fields\Types\Image;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 */
public function fields(Request $request) {
    return [
        Image::make('My avatar', 'avatar')
            ->disk('myImages')
            ->alt('My image alt'),
    ];
}
```

Debería mostrar:

```html
<img class="block h-10 rounded-full shadow-md" src="https://belich-dashboard.test/storage/1572122314php9SkNQY.png" alt="My image alt">
```

El aspecto de las imágenes (thumbnails), puede modificarse desde el archivo: `resources/views/vendor/belich/components/thumbnails.blade.php`

El archivo tiene el siguiente aspecto:

```html
<img
    src="{{ $url }}"
    class="block h-10 rounded-full shadow-md"
    {{ $alt ? 'alt="{$alt}"' : '' }}
>
```

>**Importante**: No olvide configurar en su archivo `Policy` el método `file()`, en caso contrario, le será imposible ver las imáges y gestionar los archivos, ya que no tendrá los permisos adecuados.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>addClass()</li>
        <li>addHtml()</li>
        <li>autofocus()</li>
        <li>defaultValue()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>
