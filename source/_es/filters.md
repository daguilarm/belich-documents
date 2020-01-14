---
title: Filtros de búsqueda
description: Gestionando los filtros de búsqueda con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Filtros de búsqueda

**Belich** utiliza un sistema de filtros para refinar las busquedas en la vista: `index`.

![Filters](../../../assets/images/fields/filters.jpg){.mx-auto .wp-66}
<div id="legend"><b>fig 1</b>: Ejemplo de Filtros de búsqued</div>

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
        Select::make('By Role', 'role')
            ->options([
                'user' => 'user',
                'manager' => 'manager',
                'admin' => 'admin'
            ]),
    ];
}
```

    Es importante, en el primer campo del `array`, enviar el valor a buscar en la base de datos.

El formato del método sería:

```php 
Select::make($label, $tableRowForSearch)...
```

En el primer campo, añadimos el nombre de la etiqueta que se mostrará en el desplegable, y el segundo, es el campo de la base de datos que queremos filtrar.

Si utilizamos el ejemplo de antes, **Belich** supondrá que es un filtro de igualdad, es decir, buscará el siguiente query en la base de datos:

```php 
where role = 'user'
```

Podemos indicarle diferentes tipos de filtro, utilizando el método: `filter()`:

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
        Select::make('By Role', 'role')
            ->filter('equal')
            ->options([
                'user' => 'user',
                'manager' => 'manager',
                'admin' => 'admin'
            ]),
        Select::make('By ID', 'id')
            ->filter('operations')
            ->options([
                '0-10' => '0-10',
                '11-30' => '11-30',
                '31-50' => '31-50',
                '>50' => '>50',
            ]),
        Select::make('By Name', 'name')
            ->filter('operations')
            ->options([
                'a%' => 'Start with a',
                'b%' => 'Start with b',
            ]),
        Select::make('By Name', 'name')
            ->filter('date')
            ->options([
                '10-20-2019/*' => 'From 10-20-2019',
                '*/10-20-2019' => 'Until 10-20-2019',
                '10-20-2019/12-20-2019' => 'From 10-20-2019 to 12-20-2019',
            ]),
    ];
}
```

Los filtros soportados por **Belich** son:

- **date**: realiza búsqueda con fechas.
- **equal**: es el valor por defecto, por lo que no es necesario indicarlo. Es el caso del primer ejemplo.
- **like**: realizará una busqueda mediante `like`.
- **operations**: Nos permite realizar operaciones avanzadas: 
    + Intervalos: debemos indicar el intervalo separado por `-` 
    + Mayor o menor que: `>30`, nos buscará los resultados mayores de 30 y `<30` los menores.
