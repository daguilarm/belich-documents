# Métodos de cálculo para gráficas

**Belich**, permite la implementación rápida de métricas, para ello, integra una serie de métodos que nos simplificarán el trabajo.

Para obtener los datos de una gráfica, debemos usar el método `calculate()`. Un ejemplo de uso sería:

```php
use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;

/**
 * Set the displayable labels
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->cacheInMinutes(10, $this->urikey())
        ->thisMonth()
        ->dateTable('my_date_column')
        ->totalByDay();
}
```

?>Como es lógico, podemos utilizar nuestra propia lógica para obtener los datos, simplemente hay que tener en cuenta que el resultado, deben de ser un `array`.

### make()

El método `make()`, sirve para inicializar la clase, y asignar por referencia el modelo que queremos usar.

### dateTable()

Por defecto, este parámetro se puede dejar en blanco, y **Belich**, utilizará el campo `created_at` de nuestro modelo. Pero a veces es necesario utilizar otro campo para la fecha, y por eso, damos la opción de definir de forma personalizada el nombre de la columna a utilizar.

El resto de métodos son variables, y por tanto, los veremos agrupados por funcionalidad.

?>Los métodos de caché, pueden consultarse en el apartado [Caché para gráficas](/es/metrics/cache.md)

## Determinación de fecha

Nuestras gráficas predeterminadas, se basan en dos factores: el tiempo y los resultados, es decir, muestran datos en función del tiempo.

Para indicar los intervalos de fecha para nuestra gráfica, disponemos de dos métodos:

### startDate(Carbon $date)

Simplemente, indicamos mediante un objecto `Carbon\Carbon` la fecha de inicio:

```php
Connection::make(User::class)
    ->startDate(Carbon::now()->subDays(15))
```

### endDate(Carbon $date)

Al igual que antes, indicamos mediante un objecto `Carbon\Carbon` la fecha de final:

```php
Connection::make(User::class)
    ->startDate(Carbon::now()->subDays(15))
    ->endDate(Carbon::now())
```

Para simplificar este trabajo de determinación de fechas (aún más), se han añadido una serie de helpers, que configuran las fechas por nosotros:

- `toDay()`
- `oneDay(int $day, int $month, int $year)`
- `lastDays(int $numberOfDays)`
- `thisWeek()`
- `thisMonth()`
- `lastMonth()`
- `lastMonths(int $numberOfMonths)`
- `thisYear()`
- `lastYear()`
- `lastYears(int $numberOfYears)`

Básicamente, estas clases lo que hacen es esto:

```php
/**
 * Set last month for the query
 *
 * @return self
 */
public function lastMonth() : self
{
    $this->startDate = static::getFirstDayOfTheLastMonth()->startOfDay();
    $this->endDate   = static::getLastDayOfTheLastMonth()->endOfDay();

    return $this;
}
```

## Determinación del valor

Para calcular el resultado del modelo, disponemos de los siguientes helpers:

- totalByHour()
- totalByDay()
- totalByMonth()
- totalByYears()

Próximamente, más opciones...
