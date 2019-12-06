# Campo Autocomplete 

Este campo utiliza la etiqueta `<datalist></datalist>`, para generar un campo de autocompletado (standard de HTML5).

Disponemos de dos opciones para generar el campo de autocompletado:

- `array`
- `ajax`

Veamos un ejemplo:

```php
use Daguilarm\Belich\Fields\Types\Autocomplete;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Autocomplete::make('Status', 'status')
            ->dataFrom([
                'php' => 'Php',
                'js'  => 'Javascript'
            ]),
    ];
}
```

El método `dataFrom()`, nos permitirá añadir valores a nuestro campo `<datalist></datalist>`.

Si **Belich** detecta que es un `array`, automáticamente lo inyectará en el código, si no, intentará una llamada `ajax`:

```php
use Daguilarm\Belich\Fields\Types\Autocomplete;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Autocomplete::make('Status', 'status')
            ->dataFrom(route('dashboard.ajax.example'))
            ->addVars(['id' => 2093], ['filter' => 'age'])
            ->minChars(3),
    ];
}
```

En este caso, estamos indicando que la respuesta `ajax`, se encuentra en la ruta: `route('dashboard.ajax.example')`, y por tanto, nuestro campo `<datalist></datalist>` se completará con la respuesta `json` que obtendremos.

Podemos añadir dos modificadores:

- `addVars(...$vars)`: que nos permite añadir variables a la url que indicamos en el campo: `dataFrom()`.
- `minChars()`: es el número de caracteres mínimos para que se dispare la consulta `ajax`. Por defecto está en 2.

A modo de resumen, la url que devolvería el método `dataFrom()`, sería:

~~~
https://url.com/dashboard/example.php?search=searchValue&id=2093&filter=age
~~~

?>Como se puede ver, la consulta `ajax`, utiliza la variable `search`. 

Veamos un ejemplo del controlador que responde a esta llamada `ajax`:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * Ajax response.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $results = \App\User::Query()
            ->select('id as value', 'name as label')
            ->when($request->search, function($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->take(10)
            ->get();

        return response()->json($results);
    }
}
```

Compo puede verse, es necesario devolver los valores con este formato:

```php
[
    'id'    => 1,
    'label' => 'User 1'

],
[
    'id'    => 2,
    'label' => 'User 2'

]
```

y **Belich** lo convertirá en:

```html
<datalist id="list-e9f9f0fec7514224a8a02ade19feae78">
    <option value="User 1" data-result="User 1"></option>
    <option value="User 2" data-result="User 2"></option>
</datalist>
<input type="hidden" dusk="dusk-billing_user" id="billing_user" name="billing_user" value="1">
```

Añadiendo al campo oculto el valor `id` (el cual será enviado a la BD) y visualizando el valor `label`.

El campo autocomplete, tiene un comportamiento especial, con los métodos: `dusk()` e `id()`, ya requiere de características especiales para su funcionamiento. Por ello, se generan dos campos `input`, el primero, es visible, y el segundo, es un campo oculto. Veamos un ejemplo:

```php
Autocomplete::make('Status', 'status')
    ->dataFrom(route('dashboard.ajax.example'))
    ->dusk('dusk-status')
    ->id('myID')
    ->name('myName'),
```

El primer campo (visible), sería así:

```html
<input id="input-4fce0bb20fdf6f5d56f900d7782a5d90" list="list-4fce0bb20fdf6f5d56f900d7782a5d90" type="text" dusk="dusk-autocomplete-status" value="" name="myName" onkeyup="requestAjax('https://belich-dashboard.test/dashboard/ajax/example', '4fce0bb20fdf6f5d56f900d7782a5d90', '2', '');" onchange="selectDatalist('test_name', '4fce0bb20fdf6f5d56f900d7782a5d90');">
```

El campo `id` es generado automáticamente, y al campo `dusk`, le añade el texto: `dusk-autocomplete` junto con el valor del campo: `attribute`.

El segundo campo, que está oculto, mostrará un comportamiento normal, a la hora de denominar los attributos `dusk` e `id()`:

```html
<input type="hidden" dusk="dusk-status" id="myID" name="myName" value="2">
```

?>¿Qué sucede si queremos que el valor que se guarde en la base de datos sea el campo `id`, en vez del campo `label`?

El valor que se guarda por defecto, si no se indica nada, será: `label`, y si quisiéramos cambiarlo, disponemos del método: `storeId()`, que guardará en la base de datos el valor `id`.

```php
Autocomplete::make('Status', 'status')
    ->dataFrom(route('dashboard.ajax.example'))
    ->storeId(),
```

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>dusk()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>
