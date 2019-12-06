# Campos condicionales dependientes

**Belich**, dispone de campos condicionales dependientes. Es decir, si un campo boleano está activo (verdadero o 1), mostrará los campos dependientes y condicionados a su valor. Si por el contrario su valor es falso o 0, los campos estarán activos.

?> el valor `null`, se considera falso.

Veamos un ejemplo:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Boolean::make('Boolean', 'test_boolean'),
        Conditional::make(function() {
            return [
                Text::make('Boolean test', 'test_email')
                    ->sortable()
                    ->autocompleteOn()
                    ->rules('required'),
            ];
        })->dependsOn('test_boolean', true),
    ];
}
```

Mientras el campo boleano: `test_boolean`, esté apagado (con valor `false` o `0`), el campo: `test_email` estará oculto.

También funciona con campos: `select`:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Select::make('Status', 'test_status')
            ->options(['0' => 'False', '1' => 'True']),
        Conditional::make(function() {
            return [
                Text::make('Status test', 'test_address')
                    ->rules('required'),
            ];
        })->dependsOn('test_status', true),
    ];
}
```

Por supuesto, también funciona con un campo `Text`:

```php
use Daguilarm\Belich\Fields\Types\Boolean;
use Daguilarm\Belich\Fields\Types\Conditional;
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Text::make('Name', 'test_status'),
        Conditional::make(function() {
            return [
                Text::make('Surname', 'test_surname'),
            ];
        })->dependsOn('test_status', true),
    ];
}
```

En el momento que escribamos algo, y hagamos `click` fuera del campo `input` (evento: `blur`), aparecerá el campo `test_surname` y a la inversa.

La estructura de un campo condicional, será la siguiente:

```php
Conditional::make(callable $callback)
    ->dependsOn(string $parent, ?bool $value);
```

Indicando el campo "padre" del que se depende ($parent) y el valor que puede tomar ($value);

?>El campo `$value`, acepta los siguientes valores: true, false, 1, 0 y null.
