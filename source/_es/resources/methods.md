# Métodos obligatorios

Disponemos de una serie de métodos que deben incluirse de forma obligatoria en cada recurso:

### fields()

Este método, nos permitirá generar los diferentes campos de cada recurso:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        ID::make('Id'),
        Text::make('Name', 'name')
            ->sortable()
            ->rules('required'),
        Text::make('Email', 'email')
            ->rules(
                'required', 
                'email', 
                'unique:users,email'
            )
            ->sortable(),
        Password::make('Password', 'password')
            ->creationRules(
                'required', 
                'required_with:password_confirmation', 
                'confirmed', 
                'min:6'
            )
            ->updateRules(
                'nullable', 
                'required_with:password_confirmation', 'same:password_confirmation', 
                'min:6'
            )
            ->onlyOnForms(),
        PasswordConfirmation::make('Password confirmation'),
    ];
}
```

Puede encontrar más información en: [Campos de formulario](Fields.md), donde se especifican todas las opciones disponibles.

### cards() 

Sirve par indicarle al recurso que componentes (card) debe de incluir:

```php
/**
 * Set the custom cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function cards(Request $request) {
    new \App\Belich\Cards\UserCard($request),
}
```

Puede encontrar más información en: [Cards](Cards.md), donde se especifican todas las opciones disponibles.

### metrics()

Sirve par indicarle al recurso que métricas debe de incluir:

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        new \App\Belich\Metrics\UsersPerMonth($request),
        new \App\Belich\Metrics\UsersPerDay($request),
        new \App\Belich\Metrics\UsersPerHour($request),
    ];
}
```

Puede encontrar más información en: [Gráficas y estadísticas](Metrics.md), donde se especifican todas las opciones disponibles.

### Asignar ancho a Gráficas y Cards desde el recurso

También se puede asignar el ancho de la métrica (o card) directamente desde aquí, sin necesidad de configurar el archivo de la métrica. A modo de ejemplo (válido para ambos):

```php
/**
 * Set the custom metrics cards
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        (new \App\Belich\Metrics\UsersPerMonth($request))->width('w-1/3'),
        (new \App\Belich\Metrics\UsersPerDay($request))->width('w-2/3'),
    ];
}
```
