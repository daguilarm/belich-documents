---
title: Etiquetas para gráficas
description: Gestionando las Etiquetas para gráficas de Belich
extends: _layouts.documentation
section: content
locate: es
folder: metrics
---

# Etiquetas para gráficas

**Belich** incluye una serie de etiquetas predeterminadas y basadas en la localización de **Laravel**, y que pueden ser traducidas.

Este archivo se encuentra en:

```bash
\resources\lang\vendor\belich\en\metrics.php
```

Y por tanto, puede crearse el archivo:

```bash
\resources\lang\vendor\belich\es\metrics.php
```

Con su respectiva traducción al Castellano. A modo de ejemplo, la utilización de este *helper*, sería de la siguiente forma:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Set the displayable labels
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek();
}
```

Que devolvería un array con:

```php
Array
(
    [0] => 'monday'
    [1] => 'tuesday'
    [2] => 'wednesday'
    [3] => 'thursday'
    [4] => 'friday'
    [5] => 'saturday'
    [6] => 'sunday'
)
```

El cual puede ser utilizado directamente por las gráficas. Veamos a continuación la lista de etiquetas predeterminadas por **Belich**.

### Métodos soportados

- `countriesOfTheWorld()`: Devuelve un array con todos los nombres de los paises del mundo.
- `daysOfTheWeek()`: Devuelve un array con los nombres de los días de la semana.
- `daysOfTheWeekMin()`: Devuelve un array con los nombres de días de la semana (usando abreviaciones).
- `daysOfTheMonth()`: Devuelve un array con los días del mes: de 1 a (28, 29, 30 o 31).
- `hoursOfTheday()`: Devuelve un array con valores de 1 a 24.
- `monthsOfTheYear()`: Devuelve un array con los nombres de los meses del año.
- `monthsOfTheYearMin()`: Devuelve un array con los nombres de los meses del año (usando abreviaciones).
- `listOfYears()`: Devuelve un array con los años en función del año inicial.

Agunos ejemplos:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek();
}

//Will return
['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']
```

Veamos el ejemplo que puede crear más dudas:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::listOfYears(3);
}

//Will return if today is 2019
[2017, 2018, 2019]
```

Le hemos indicado que nos devuelva un array con los tres últimos años.

Todos los métodos devuelven *arrays*, pero aquellos que el *array* contiene texto (*strings*) y no números, puede ser formateado. Estos métodos, como por ejemplo: `Labels::daysOfTheWeek()`, admiten un parámetro adicional:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek('capitalize');
}

//Will return if today is 2019
['MONDAY', 'TUESDAY', ...]
```

Es decir, podemos formatear la salida del array. Las opciones soportadas son:

- **capitalize**: nos devolverá el texto en mayúsculas.
- **lower**: nos devolverá el texto en minúculas.
- **title**:  nos devolverá el texto con la primera letra capitalizada (ucfirst). Esta es la opción por defecto.
