# Métodos para modificar los tipos de un campo

**Belich** te permite asignar el tipo de un campo antes de guardarlo en la base de datos, y sin necesidad de utilizar `accessors` o `mutators`.

El procedimiento es el siguiente:

```php
use Daguilarm\Belich\Fields\Types\Text;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Status', 'status')
            ->toInteger(),
    ];
}
```

Y el campo será convertido en `integer` antes de añadirse a la base de datos. Justo después de la validación, ya que esta modificación se realiza en el `Form Request` correspondiente a la acción del Controlador.

Los tipos disponibles son:

- `toBoolean()`
- `toDate(string $format)`
- `toInteger()`
- `toFloat()`
- `toJson()`
- `toYear()`
- `toString()`

?>Especial mención al campo `toDate()`, que nos va a obligar a añadir el formato de la fecha, ya que creará un objeto `Carbon\Carbon` a partir de dicho formato.
