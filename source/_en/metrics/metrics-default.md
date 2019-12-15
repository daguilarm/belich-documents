---
title: Graphs and statistics
description: Managing Belich Graphs and Statistics
extends: _layouts.documentation
section: content
locate: en
folder: metrics
---

# Graphs and statistics

For the visualization of graphics, the library has been chosen [ChartistJS](https://gionkunz.github.io/chartist-js/index.html){.link-out}, a very light, complete and functional option.

**Belich** allows you to configure graphs easily and quickly, using the terminal:

```php
php artisan belich:metric MetricName
```

Generating a file in the location: `App\Belich\Metics`. In this file, we will find two variables to define:

```php
//app\Belich\Metrics\MetricName.php

/** @var string */
public $type = 'bars';

/** @var string */
public $width = 'w-1/3';
```

Although, as we will see later, **Belich** will offer us a range of variables to configure much wider. Aspect that we will develop in more detail later.

## Variables 

Let's start with the variables `$type` and ` $with`, which we mentioned earlier:

###a) type

It allows us to indicate the type of graph we want to show, the available options are:

- line
- bars
- horizontal-bars
- pie (developing...)

![Metrics types](../../../assets/images/metrics/graph-types.webp){.mx-auto}
<div id="legend"><b>fig 1</b>: Metrics types</div>

In the *figure 1*, we can see from left to right: `horizontal-bars`, `line` and `bars`.

>The pie chart, are available only as a very basic option, since natively it is not too developed.

![Metrics types](../../../assets/images/metrics/graph-pie.webp){.mx-auto .w-80 }
<div id="legend"><b>fig 2</b>: Pie Chart</div>

###b) width

Indicates the width of the graph. To do this, we use [tailwindcss](https://www.tailwindcss.com){.link-out}, and therefore, the most used class in our projects will be:

- w-1/3
- w-2/3
- w-full

>Of course, you can create your own CSS classes and include them.

You can also use the `width()` method to assign the width. For [more information](../resources/mandatory-methods#width).

The rest of the variables that we can use, and that are not by default in the file that **Belich** generated, are:

### color

It allows us to define a basic generic color for our entire graphic, so that **Belich** will assign the different shades of the color, to the different parts of the graphic.

The colors are from the list of colors supported by tailwindcss. For example: `teal`, `red`, `yellow`,...

```php
/** @var string */
public $color = 'red';
```

<div class="blockquote-alert"><strong>Remember</strong>: only the name, not the intensity. Do not use: <code>teal-500</code>, use: <code>teal</code>, because we are defining the color template, not an specific color.
</div>

If you wish, you can use hexadecimal or rgb colors, but they will only accept the graphic, leaving the rest of the values like: the title, the legend, the labels,... all with the default values... so maybe not the best option?

```php
/** @var string */
public $color = '#999999';

/** @var string */
public $color = 'rgb(238, 241, 244)';
```

### defineColors

It is used to define the specific colors of each part of the graph. In this case, only color names are allowed, or the default values will be used.

```php
/** @var array ['area-color', 'line-color', 'title-color', 'legend-color'] */
public $defineColors = [
    'title-color'  => 'green', 
    'legend-color' => 'orange',
    'line-color'   => 'blue', 
    'label-color'  => 'blue',//This is for pie graph
    'area-color'   => 'red', 
]
```

<div class="blockquote-alert"><strong>Remember</strong>: only the name, not the intensity. Do not use: <code>teal-500</code>, use: <code>teal</code>, the system will add the intensity value automatically depending on the field.</div>

Both variables: `$color` and `$defineColors` are compatible, we can define a general color and also, define specific colors for each part of the graph:

```php
/** @var string */
public $color = 'red';

/** @var array */
public $defineColors = [
    'title-color'  => 'green', 
]
```

The four parameters that it allows are:

- **title-color**: the color of the graphic title.
- **legend-color**: the base color for the legend.
- **line-color**: the color of the graph.
- **area-color**: if our graph has the option to show the area, we can assign a color for this.

### grid

By default, our graph will show the grid to see the data in better way. You can disable it as follows:

```php
/** @var bool */
public $grid = false;
```

In the figure 1, you can see that the first two graphs have `grid` and the last one (horizontal bars) doesn't have it.

### legend_h

We can assign a name for the X axis (abscissa), and therefore, create a legend box.

```php
/** @var string */
public $legend_h = 'Days';
```

### legend_y

We can assign a name for the Y axis (ordinate), and therefore, create a legend box.

```php
/** @var string */
public $legend_y = 'Active users';
```

### marker

We can assign a marker for each point of the graph (only in linear graphs). By default, the system has it disabled, but we can assign the following:

- **butt**: Default value. Disable mark.
- **square**: Show a square.
- **round**: Show a circle.

![Metrics types](../../../assets/images/metrics/graph-markers.webp){.mx-auto}
<div id="legend"><b>fig 3</b>: Marker types</div>

```php
/** @var string ['butt', 'square', 'round'] */
public $marker = 'square';
```

## Methods 

**Belich** has several methods that we must use in our graphs, and they are mandatories:

### calculate

Get the results from the database:

```php
/**
 * Get the values from storage
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->lastYear()
        ->totalByMonth();
}
```

The configuration options are explained in the section: [Calculations with graphs](metrics-calculate). 

### Labels 

Define the labels for the graph.

```php
/**
 * Set the displayable labels
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return ['Monday',...];
}
```

They can be customized by the user (always remembering that an array should be returned), or you can use the **Belich** tag creation library, which is explained in its own section [Labels for graphics](metrics-labels). 

An example can be seen below:

```php
use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Set the displayable labels
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheMonth();
}
```

### name

It is the name of the graph:

```php
/**
 * Set the displayable name of the metric.
 *
 * @return string
 */
public function name(Request $request)
{
    return $this->name = 'Users per month';
}
```

### uriKey

It allows us to define our graph with an unique identifier. This parameter is generated automatically when creating the graph with `artisan`, although it can be modified.

>Possible errors in the graphic display: check that they do not have the same `uriKey`.

```php
/**
 * Get the URI key for the metric.
 *
 * @return string
 */
public function uriKey()
{
    return 'users-per-month';
}
```

As a summary, let's see a complete file with all the parameters:

```php 
namespace App\Belich\Metrics;

use App\User;
use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;
use Daguilarm\Belich\Components\Metrics\Graph;
use Daguilarm\Belich\Components\Metrics\Labels;
use Illuminate\Http\Request;

class UsersPerDay extends Graph {

    /** @var string */
    public $color  = 'teal';

    /** @var string */
    public $legend_h = 'Users';

    /** @var string */
    public $legend_v = 'Days';

    /** @var string */
    public $type = 'line';

    /** @var string */
    public $width = 'w-1/3';

    /** @var bool */
    public $withArea = true;

    /**
     * Initialize the metric
     *
     * @return string
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * Set the displayable name of the metric.
     *
     * @return string
     */
    public function name(Request $request)
    {
        return $this->name = 'Users per day';
    }

    /**
     * Set the displayable labels
     *
     * @return string
     */
    public function labels(Request $request) : array
    {
        return Labels::daysOfTheMonth();
    }

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

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey() : string
    {
        return 'users-per-day';
    }
}
```
