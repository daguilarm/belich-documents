# Paneles

Belich incorpora la opción de agrupar los campos en paneles. Un ejemplo sería:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\ID;
use Daguilarm\Belich\Fields\Types\Select;
use Daguilarm\Belich\Fields\Types\Panels;
use Daguilarm\Belich\Fields\Types\Text;
use Daguilarm\Belich\Fields\Types\TextArea;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Panels::create('Billing Info', function() {
            return [
                ID::make('Id'),
                Text::make('Billing name', 'billing_name')
                    ->sortable()
                    ->rules('required'),
                Boolean::make('Status', 'billing_status')
                    ->sortable(),
                Text::make('N.I.F.', 'billing_nif')
                    ->sortable()
                    ->rules('required'),
            ];
        }),
        Panels::create('Personal info', function() {
            return [
                Text::make('Telephone', 'billing_telephone')
                    ->sortable()
                    ->rules('required'),
                Text::make('Address', 'billing_address')
                    ->sortable()
                    ->rules('required'),
                TextArea::make('Telephone2', 'billing_telephone')
                    ->count(200)
                    ->rules('required')
                    ->addClass('testing-class')
            ];
        }),
    ];
}
```

Obteniendo:

![Panels](../../images/fields/panels.png)
<div id="legend"><b>fig 3</b>: Campos agrupados por paneles</div>

?>Los paneles se visualizan en todas las vistas salvo el `index`

También nos ofrecen la opción de personalizar el color del fondo y del texto, ya que los títulos de los paneles, están generados por un campo `Header`, y por tanto, podemos personalizarlo. Para ello, añadiremos el color de fondo y el color del texto, de la siguiente forma:

```php
use Daguilarm\Belich\Fields\Types\ID;
use Daguilarm\Belich\Fields\Types\Panels;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Panels::create('Billing Info', function() {
            return [
                ID::make('Id'),
                Text::make('Billing name', 'billing_name')
                    ->sortable()
                    ->rules('required'),
            ];
        }, 'teal-700', 'white'),
    ];
}
```

Es decir, la estructura de un campo `Panel`, es:

```php
Panels::create(string $label, callable $fields, ?string $background, ?string $color);
```
