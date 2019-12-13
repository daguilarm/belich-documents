---
title: Caché para gráficas
description: Gestionando Caché para gráficas con Belich
extends: _layouts.documentation
section: content
locate: es
folder: metrics
---

# Caché para gráficas

Para asignar el caché, se ha optado por un *helper*, principalmente pensando en los cambios en la caché que se integraron en **Laravel 5.8**.

La utilización del *helper*, nos va a permitir guardar todos los datos como un objeto `Carbon\Carbon`, y poder utilizar el formato que más nos guste: segundos, minutos, horas,...

Todos los métodos, necesitan dos parámetros: 

- La cantidad de tiempo. 
- Una clave única. 

>La mejor opción para la clave única, es pasar la `$this->uriKey()` de la gráfica, pero se puede utilizar la que más convenga.

Se debe incluir en el método [calculate()](metrics-calculate):

```php
/**
 * Make calculations
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->cacheInMinutes(10, $this->uriKey())
        ->lastMonth()
        ->totalByDay();
}
```

Los métodos disponibles para gestionar la caché, son:

- `cacheForEver()`
- `cacheInMinutes(int $minutes, string $key)`
- `cacheInHours(int $hours, string $key)`
- `cacheInDays(int $days, string $key)`
