---
title: Métodos basados en patrones
description: Gestión de métodos basados en patrones
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Métodos basados en patrones

**Belich** dispone de tipos de campos, como son: `Number` o `Date` que utilizan los estándares de `html5` para funcionar, por lo tanto, el comportamiento dependerá de cada navegador, y de como este interprete su funcionamiento.

¿Pero que pasa si queremos utilizar un campo `Date` pero que funcione conforme a un patrón que nos interese?. Es decir, en vez de mostrarnos un calendario, lo que queremos es que el campo solo permita números y que tengan este formato:

        dd/mm/YYYY

Para hacer esto, es para lo que se utilizan los campos basados en patrones, para que podamos definir estos comportamientos. 

Veamos el ejemplo anterior, pero con código:

```php
use Daguilarm\Belich\Fields\Types\Pattern;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Pattern::make('Current date', 'date')
            ->mask('99/99/9999'),
    ];
}
```

Simplemente, tenemos que utilizar el método `mask()` para determinar el patrón de comportamiento del campo. El campo, está basado en el código de [vanilla-masker](https://github.com/vanilla-masker/vanilla-masker){.link-out}. 

A continuación, tienes un resumen de su funcionamiento:

- `9`: para indicar que el campo debe de ser un número.
- `A`: para indicar que el campo debe de ser alfabético.
- `S`: para indicar un campo alfanumérico.

Algunos ejemplos:

```php
//Número de teléfono
$value  = '1099911111'; 
$mask   = '(99) 9999-9999';
$result = '(10) 9991-1111';

//D.N.I.
$value  = '123456789K'; 
$mask   = '999999999-A';
$result = '123456789-K';

//Número de serie
$value  = '1A34M6790A'; 
$mask   = 'SS-SS-SSSS-SS';
$result = '1A-34-M679-0A';
```

Por defecto, el campo es definido como `string`, es decir, el método `toString()`, es añadido en el constructor. Más información sobre los tipos soportados: [Tipos](casts)

Por ejemplo, si nuestro campo debe ser numérico y soportar solo dos decimales:

```php
use Daguilarm\Belich\Fields\Types\Pattern;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Pattern::make('Current date', 'date')
            ->mask('99999.99')
            ->toFloat(),
    ];
}
```

Los campos basados en patrones, funcionan de forma similar al resto de campos, por lo que heredan los mismos métodos que el resto. Más información sobre los métodos genéricos que soportan: [Métodos genéricos](methods)
