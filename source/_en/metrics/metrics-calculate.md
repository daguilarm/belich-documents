---
title: Calculation methods for graphs
description: Managing calculation methods for graphs with Belich
extends: _layouts.documentation
section: content
locate: en
folder: metrics
---

# Calculation methods for graphs

**Belich**, allows the rapid implementation of metrics, for this, it integrates a series of methods that will simplify our work.

To obtain the data of a graph, we must use the `calculate()` method. An example of use would be:

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

>Of course, we can use our own logic to obtain the data, but we just have to keep in mind that the result must be a `array`.

### make()

The `make()` method, serves to initialize the class, and assign by reference, the model we want to use.

### dateTable()

By default, this parameter can be left blank, and **Belich** will use the `created_at` field of our model. But sometimes it is necessary to use another field for the date, and for that reason, we give the option to define in a personalized way the name of the column to be used.

The rest of the methods are variable, and therefore, we will see them grouped by functionality.

>The cache methods can be found in the section [Cache for graphics](cache)

## Date Determination

Our default graphs are based on two factors: time and results, that is, they show data as a function of time.

To indicate the date ranges for our graph, we have two methods:

### startDate(Carbon $date)

Simply, we indicate with a `Carbon\Carbon` object, the start date:

```php
Connection::make(User::class)
    ->startDate(Carbon::now()->subDays(15))
```

### endDate(Carbon $date)

As before, we indicate with a `Carbon\Carbon` object, the end date:

```php
Connection::make(User::class)
    ->startDate(Carbon::now()->subDays(15))
    ->endDate(Carbon::now())
```

To simplify this work of determining dates, a series of helpers have been added. This helpers will configure the dates for us:

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

These classes, what they really do is:

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

## Value determination

To calculate the result of the model, we have the following helpers:

- totalByHour()
- totalByDay()
- totalByMonth()
- totalByYears()

Soon, more options...
