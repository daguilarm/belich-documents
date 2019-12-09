---
title: Belich facades - Graph render
description: Managing belich facades to remderize the graphics
extends: _layouts.documentation
section: content
locate: en
folder: facades/chart
---

# Chart Facade: graphic render

The way to render a graph in our **Blade** *template*, will be as follows:

```php
{!! Chart::render($request) !!}
```

**Belich** will already performs this operation by default, in fact, it makes this call in the template located in `resources\views\vendor\belich\dashboard\index.blade.php`.

If you need to generate your own graphs, you will only have to call the `render()` method and pass the variable `$request`, as shown in the previous example. 

If we had our own logic, we must take into account that the system will search in the variable `$request`, for the object`$request->metrics`, therefore we must include it (in the request).

As an example and for a better understanding of the `render ()` method, the code that is executed in the method is as follows:

```php
/**
 * Render the metric card
 *
 * @param  \Illuminate\Http\Request  $request
 * @return string
 */
public function render(Request $request) : string
{
    //Render the metric view
    $metrics = collect($request->metrics)
        ->map(function($metric) {
            return view(
                'belich::components.metrics.chart', 
                compact('metric')
            )->render();
        });

    return $this->hasResults($metrics);
}
```

The `hasResults()` method simply verifies that the graph exists, and if so, sends it to the view.
