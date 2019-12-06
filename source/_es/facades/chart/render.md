# Chart Facade: mostrar gráfica

Mostremos primero un ejemplo:

```php
{!! Chart::render($request) !!}
```

Belich ya realiza esta operación por defecto, en el template ubicado en `resources\views\vendor\belich\dashboard\index.blade.php`.

En caso de necesitar generar otras gráficas, sólo tenemos que llamar al método `render()` y pasarle la variable `$request`. 

Si disponemos de nuestra propia lógica, debemos tener en cuenta, que el sistema buscará en la variable `$request`, el objecto `$request->metrics`, por lo tanto debemos incluirlo.

A modo de ejemplo y para entender mejor el funcionamiento del método `render()`, se muestra el código a continuación:

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
