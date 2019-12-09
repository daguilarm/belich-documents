---
title: Fachadas (facades) de belich - Renderizar gráficas
description: Gestionando fachadas de belich para remderizar las gráficas
extends: _layouts.documentation
section: content
locate: es
folder: facades/chart
---

# Chart Facade: mostrar gráfica

La forma de mostrar una gráfica en nuestro *template* **Blade**, es de la siguiente manera:

```php
{!! Chart::render($request) !!}
```

**Belich** ya realiza esta operación por defecto, de hecho, hace esta llamada en el template ubicado en `resources\views\vendor\belich\dashboard\index.blade.php`.

En caso de necesitar generar nuestras propias gráficas, sólo tendremos que llamar al método `render()` y pasarle la variable `$request`, tal y como se ha mostrado en el ejemplo anterior. 

Si disponemos de nuestra propia lógica, debemos tener en cuenta que el sistema buscará en la variable `$request`, el objecto `$request->metrics`, por lo tanto debemos incluirlo.

A modo de ejemplo y para entender mejor el funcionamiento del método `render()`, se muestra el código que se ejecuta en el método:

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

El método `hasResults()`, simplemente verifica que existe la gráfica, y si es así, la envia a la vista.
