---
title: Labels for graphics
description: Managing Belich's Labels for graphics
extends: _layouts.documentation
section: content
locate: en
folder: metrics
---

# Labels for graphics

**Belich** includes a series of predetermined labels based on the location of **Laravel**, and this labels can be easily translated.

You can find this file in:

```bash
\resources\lang\vendor\belich\en\metrics.php
```

And therefore, if we wanted to create a file in Spanish:

```bash
\resources\lang\vendor\belich\es\metrics.php
```

>**Belich** automatically, will determine which language file to choose, based on the language configured in **Laravel**.

The tags will be used as follows:

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

That would return an array with:

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

Which can be used directly by the graphs. Let's see below the list of default labels soported by **Belich**.

### Supported methods

- `countriesOfTheWorld()`: Returns an array with all the names of the countries of the world.
- `daysOfTheWeek()`: Returns an array with the names of the days of the week.
- `daysOfTheWeekMin()`: Returns an array with the names of days of the week (using abbreviations).
- `daysOfTheMonth()`: Returns an array with the days of the month: from 1 to (28, 29, 30 or 31).
- `hoursOfTheday()`: Returns an array with values from 1 to 24.
- `monthsOfTheYear()`: Returns an array with the names of the months of the year.
- `monthsOfTheYearMin()`: Returns an array with the names of the months of the year (using abbreviations).
- `listOfYears()`: Returns an array with the years depending on the initial year.

A few examples:

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

Let's look at the example that can create more doubts:

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

We have indicated that we return an array with the last three years.

All methods return *arrays*, but those that the * array * contains text (*strings*) and not numbers, can be formatted. These methods, such as: `Labels::daysOfTheWeek()`, support an additional parameter:

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

So, we can format the output of the *array*. The supported options are:

- **capitalize**: It will return the text in capital letters.
- **lower**: It will return the text in lowercase.
- **title**: It will return the text with the first capitalized letter (ucfirst()). This is the default option.

Of course, we can customize the method with our own *arrays*, we don't have to use the default ones:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * @return string
 */
public function labels(Request $request) : array
{
    // Odd days
    return [1, 3, 5, 7, 9, 11];
}
```

Or even: 

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * @return string
 */
public function labels(Request $request) : array
{
    // Three days a week
    return ['monday', 'wednesday', 'friday'];
}
```
