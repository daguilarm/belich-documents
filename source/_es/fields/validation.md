# Validación de campos 

Belich dispone de una serie de métodos que nos permitirán añadir reglas de validación a los campos de nuestros recursos. Estos métodos son genéricos, y se aplican a todos los tipos de campo.

El método principal, para asignar reglas, es el método: `rules()`, con el que podemos indicar las reglas de validación de cada campo. Utilizando para ello, las mismas reglas que utiliza Laravel.

Los métodos soportados son:

- `rules()`
- `creationRules()`
- `updateRules()`

A modo de ejemplo:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Email', 'email')
            ->rules('required', 'email'),
        Text::make('Edad', 'age')
            ->creationRules('required', 'numeric')
            ->updateRules('numeric'),
    ]
}
```

En el primer caso, al utilizar el método `rules()` indicamos que esas reglas son tanto para cuando creamos como para cuando editamos.

Mientras que en el segundo caso, estamos definiendo reglas diferentes para cuando creamos y para cuando actulizamos.

Podemos añadir reglas personalizadas. Por ejemplo:

```php
use Illuminate\Validation\Rule;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Email', 'email')
            ->rules('required', 'email', Rule::unique('users')->ignore($request->user()->id)),
    ]
}
```
