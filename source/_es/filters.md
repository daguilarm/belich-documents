---
title: Filtros de búsqueda
description: Gestionando los filtros de búsqueda con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Filtros de búsqueda

**Belich** utiliza un sistema de filtros para refinar las busquedas en la vista: `index`.

![Filters](../../../assets/images/filters.jpg){.mx-auto .wp-66}
<div id="legend"><b>fig 1</b>: Ejemplo de Filtros de búsqueda</div>

Para utilizar los filtros, debemos añadirlos a nuestros recursos. Por ejemplo, para añadir un filtro a los usuarios (como en el ejemplo anterior), nos iremos al archivo: `app\Belich\Resources\User.php`, y añadiremos el siguiente método:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function filters(Request $request): array
{
    return [
        Filter::make('By Role', 'role')
            ->filterAs('equal')
            ->options([
                'user' => 'User',
                'manager' => 'Manager',
                'admin' => 'Admin'
            ]),
    ];
}
```

Por ejemplo, si seleccionamos la primera opción: `['user' => 'User']`, crearíamos el siguiente query: 

```php 
select * from `users` where `role` = 'user' limit 10 offset 0
```

El formato del método `filter()` sería:

```php 
Filter::make($label, $tableRowForSearch)...
```

En el primer campo, añadimos el nombre de la etiqueta que se mostrará en el desplegable, y el segundo, es el campo de la base de datos que queremos filtrar.

Podemos indicarle diferentes tipos de filtro, utilizando el método: `filterAs()`:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function filters(Request $request): array
{
    return [
        Filter::make('By Role', 'role')
            ->filterAs('equal')
            ->options([
                'user' => 'User',
                'manager' => 'Manager',
                'admin' => 'Admin'
            ]),
        Filter::make('By ID', 'id')
            ->filterAs('operations')
            ->options([
                '0-10' => 'Between 0-10',
                '11-30' => 'Between 11-30',
                '31-50' => 'Between 31-50',
                '>50' => 'Greater than 50',
                '<15' => 'Minor than 15',
            ]),
        Filter::make('By Name', 'name')
            ->filterAs('like')
            ->options([
                'a%' => 'Start with a',
                'b%' => 'Start with b',
            ]),
    ];
}
```

<div class="alert info">Si no utilizamos el método <code>filterAs()</code>, asumirá por defecto el valor: <code>equal</code></div>

Los filtros soportados por **Belich** son:

- **equal**: es el valor por defecto, por lo que no es necesario indicarlo. Es el caso del primer ejemplo.
- **like**: realizará una busqueda mediante `like`.
- **operations**: Nos permite realizar operaciones avanzadas: 
    + Intervalos: debemos indicar el intervalo separado por `-` 
    + Mayor o menor que: `>30`, nos buscará los resultados mayores de 30 y `<30` los menores.

Y el método especial para fechas `date`:

```php
Filter::make('By Creation date', 'created_at')
    ->filterAs('date')
    ->format('d/m/Y')
    ->mask('00/00/0000'),
```

Donde disponemos de dos métodos: `format()` y `mask()`.

## format()

Nos permite indicar el formato que se utilizará en los campos para introducir la fecha. Si lo dejamos en blanco, utilizará el formato por defecto el siguiente formato: `d/m/Y`.

## mask()

No permite definir la máscara para el formato de fecha. Debe de ser coincidente con el método `format()`. Por defecto, el valor será: `00/00/0000`. Para más información de la utilización del método `mask()`, visite el siguiente apartado: [método mask()](../fields/patterns)
