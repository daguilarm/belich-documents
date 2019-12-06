# Métodos genéricos soportados

En este apartado, veremos los métodos modificadores, y que por lo general, son comunos a todos los campos soportados por Belich (aunque siempre hay excepciones).

Los métodos modificadores soportados actualmente, son:

- `asHtml()`
- `addClass()`
- `autocompleteOff()`
- `autocompleteOn()`
- `autofocus()`
- `data()`
- `defaultValue()`
- `disabled()`
- `displayUsing()`
- `dusk()`
- `help()`
- `info()`
- `id()`
- `name()`
- `pattern()`
- `placeholder()`
- `prefix()`
- `readonly()`
- `resolveUsing()`
- `sortable()`
- `suffix()`
- `textAlign()`

Veamos un ejemplo completo

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
            ->addClass('text-blue', 'font-bold')
            ->data('url', 'http://url.com')
            ->defaultValue('email@email.com')
            ->disable()
            ->dusk('dusk-email')
            ->help('Enter a valid email')
            ->info('Important info')
            ->id('email_id')
            ->name('email_name')
            ->placeholder('my email')
            ->pattern('[a-z]{1,15}')
            ->readonly()
            ->autocompleteOff()
    ]
}
```

Debería mostrar:

```html
<label>Email</label>
    <input type="text" class="text-blue font-bold" data-url="http://url.com value="email@email.com" disabled="disabled" dusk="dusk-email" id="email_id" name="email_name" placeholder="my email" pattern="[a-z]{1,15}" autocomplete="off" readonly/>
<div class="help">Enter a valid email</div>
```

?>**Importante**: Los campos `help` e `info`, permiten la utilización directa de `html`, por lo que podríamos hacer algo así:

```php
Text::make('Email', 'email')
    ->help('<h1>Use a valid email!</h1>, more info: <a href="http://info.net">more info</a>'),
```

Faltarían los métodos: `asHtml()` y `sortable()`. 

El primero, nos permite devolver a las vistas `index` y `show` el resultado como si fuera `HTML`, es decir: sin escapar, y por tanto, ejecutado como código `HTML`.

El segundo método (`sortable()`), nos indica que en la vista `index`, la columna de la tabla correspondiente a este campo, puede ser ordenada de mayor a menor o a la inversa.

Los métodos `sortable()`, `readonly()`, `disabled()`, soportan valores boleanos, es decir, podemos añadir condiciones para que se muestren. Eso si, si el valor no es boleano, dará error. 

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
            ->readonly(auth()->user()->isAdmin())
    ]
}
```

Disponemos también de un método llamado: `displayUsing()`, el cual nos permitirá formatear el valor de nuestro campo (en las vistas `index` y `show`), realizando un `callback` y permitiéndonos manipular el valor del campo. Se método se usaría de la siguiente forma:

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
            ->displayUsing(function($value) {
                return strtolower($value);
            })
    ]
}
```

Devolviendo el resultado en minúsculas, permitiéndonos formatear el resultado del campo. **Es decir, podemos acceder al valor del campo y manipularlo**. Si lo que queremos es acceder al modelo, debemos usar el método: `resolveUsing()`. La sintaxis es idéntica a `displayUsing()`:

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
            ->resolveUsing(function($model) {
                return $model->relationship->item;
            })
    ]
}
```

Los métodos `suffix()` y `prefix()`, nos permitirán añadir un prefijo o sufijo al valor del campo. Por ejemplo, el campo nos muestra un importe, y quermeos añadir el símbolo del dolar:

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
            ->suffix('$')
    ]
}
```

Nos devolverá:

```
1298.55$
```

Los campos `suffix()` y `prefix()`, admiten un segundo valor en el método. Este campo es un boleano que nos permite indicarle si queremos que exista un espacio, antes del sufijo o después del prefijo.

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
            ->suffix('$', $space = true)
    ]
}
```

Nos devolverá:

```
1298.55 $
```

?>Recuerda que los métodos: `displayUsing()`, `suffix()` y `prefix()` solo afectan a las vistas: `index` y `show`. El resto de vistas no se ven afectadas por estos métodos, aunque los nuestran sin modificaciones.

?>El método `resolveUsing()`, no se ve en las vistas de formularios, solo se ve en las vistas: `index` y `show`.

También se dispone de un método para alinear el contenido interno de un campo de formulario. Para ello, utilizaremos el método `textAlign()`. Los valores soportados son: `left`, `center`,`right` y `justify`. Este método, lo que hace es añadir una clase de alineación al campo:

```php
$field->textAlign('left');
```

Mostraría:

```html
<input class="text-left">
```

Realmente, es un alias del método `addClass()`, por lo que obtendríamos lo mismo así:

```php
$field->addClass('text-left');
```
