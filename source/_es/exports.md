---
title: Exportar / Descargar archivo
description: Gestionando la exportación o descarga de archivos con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Exportar / Descargar archivo

**Belich** permite descargar el *Recurso* actual (a partir de su *Modelo*) en formato: `csv`, `xls` y `xlsx`. La descarga se realiza desde la *Vista* `index` de cada *Recurso*.

Entre las opciones de descarga que tenemos, podemos encontrar:

- El **formato**
- Si queremos descargar **todo**, o solo **los campos seleccionados**.

### Configuración del driver

**Belich**, permite utilizar diversos *drivers* de conversión de archivos. Por defecto utiliza [FastExcel](https://github.com/rap2hpoutre/fast-excel).

Para configurar el *driver*, hay que hacerlo desde el archivo de configuración, ubicado en:

```php
.\config\belich.php
```

En él encontrará el siguiente código:

```php
/*
|--------------------------------------------------------------------------
| Export file (xls, xlsx, csv) from supported drivers
|--------------------------------------------------------------------------
|
| Belich has support for:
|
| @Driver: Fast Excel
| @Github: https://github.com/rap2hpoutre/fast-excel
| @value: 'fast-excel'
|
*/
'export' => [
    'driver' => 'fast-excel',
],
```

Si no se indica nada, se descargarán todas las columnas de la tabla mediante una `Illuminate\Database\Eloquent\Collection`. Si lo que queremos es determinar qué columnas queremos descargar, podemos indicárselo desde el *Modelo*, añadiendo el método `download()`:

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    /**
     * The table columns that will be exported to the file.
     *
     * @var array
     */
    public function download(): array
    {
        return [
            'id',
            'test_name',
        ];
    }

}
```

Actualmente, los *drivers* soportados son:

- `fast-excel`.
- `maatwebsite` (En desarrollo, actualmente hay en error con el *package*...).

Y por último, en el *Recurso* que quieras que sea descargable, tendrás que añadir el siguiente código:

```php
/** 
 * @var bool
 */
public static $downloable = true;
```
