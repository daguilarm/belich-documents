---
title: Campos de formularios 
description: Gestión de campos de formulario
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Tipos de campo generales

**Belich**, dispone de una amplia lista de campos predefinidos. Los hemos divido en dos tipos, los genéricos (que son de los que hablaremos en este punto), y los específicos, los cuales, por su complejidad o peculiaridades, los hemos confinado su propia sección. 

Los campos específicos soportados por **Belich**, son:

- [Autocomplete](/es/fields/autocomplete.md)
- [File](/es/fields/files.md)
- [Image](/es/fields/files.md#Image)
- [Panels](/es/fields/panels.md)
- [Pattern](/es/fields/patterns.md)
- [Tabs](/es/fields/tabs.md)

Los campos genéricos soportados por **Belich**, son:

- `Boolean`
- `Color`
- `Coordenates`
- `Countries`
- `Date`
- `Decimal`
- `Email`
- `Header`
- `Hidden`
- `Id`
- `Markdown`
- `Number`
- `Range`
- `Select`
- `Text`
- `TextArea`
- `Time`
- `Password`
- `PasswordConfirmation`
- `Year`

Cada campo, puede disponer de métodos exclusivos para cada uno de ellos. A continuación, explicamos estós métodos a la vez que explicamos, de forma individual, cada uno de los tipos de campo.

?>Todos los campos que admiten decimales: `Decimal()`, `Number()` o `Coordenates()`, utilizan la etiqueta `<html lang="en">` de la cabecera de la web, para utilizar el separador adecuado: coma o punto. 


### Campo Boolean 

Nos permite generar un `checkbox` que admite los valores: verdadero o falso.

![Boolean example - 1](../../images/fields/boolean-1.png)
<div id="legend"><b>fig 1</b>: Ejemplo de campo boleano</div>

Este campo se visualiza en las vistas `index` y `show` de la siguiente forma:

![Boolean example - 2](../../images/fields/boolean-2.png)
<div id="legend"><b>fig 2</b>: Ejemplo de campo boleano</div>

Pero a veces nos interesa que en estas vistas (`index` y `show`), en vez de mostrarle un valor activo o no, se muestre un texto para cuando está activo y otro para cuando esta desactivado. Veamos un ejemplo:

```php
use Daguilarm\Belich\Fields\Types\Boolean;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Boolean::make('Status', 'status')
            ->trueValue('on')
            ->falseValue('off'),
    ];
}
```

?>Si ambos métodos no tienen un valor asignado, no se mostrará ninguno de los dos.

?>Este campo se guarda automáticamente como `bool`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.

Se puede seleccionar el color del campo, el sistema solo permite los colores: `green`, `blue` y `red`, el valor por defecto es `green`. La variable color, puede asignarse de la siguiente forma:

```php
Boolean::make('Status', 'status')
    ->color('red'),
```

Este campo es editable, en las vistas: `edit` y `create`.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>addClass()</li>
        <li>autofocus()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>

### Campo Color 

Es un alias para el campo `HTML5` color:

```php
 use Daguilarm\Belich\Fields\Types\Color;

 /**
  * Get the fields displayed by the resource.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return Illuminate\Support\Collection
  */
 public function fields(Request $request) {
     return [
         Color::make('Select color', 'color')
            ->defaultValue('#e66465'),
     ];
 }
```

Mostrando:

```html
<input class="mr-3" value="#e66465" dusk="dusk-color" id="color" name="color" type="color">
```

Permite que en las vistas: `index` y `show`, se muestre el color (como si fuera html), en vez del código. Mostrando algo así:

```html
<div class="w-12 h-2 rounded" style="background-color:#a9d1bf">&nbsp;</div>
```

Para ello, utilizaremos el método: `asColor()`

```php
 use Daguilarm\Belich\Fields\Types\Color;

 /**
  * Get the fields displayed by the resource.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return Illuminate\Support\Collection
  */
 public function fields(Request $request) {
     return [
         Color::make('Select color', 'color')
            ->defaultValue('#e66465')
            ->asColor(),
     ];
 }
```

### Campo Coordenates 

Con este campo, podremos añadir a nuestra base de datos las coordenadas: latitud y longitud. Veamos un ejemplo:

```php
 use Daguilarm\Belich\Fields\Types\Coordenates;

 /**
  * Get the fields displayed by the resource.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return Illuminate\Support\Collection
  */
 public function fields(Request $request) {
     return [
         Coordenates::make('Lat', 'lat_coordenates'),
     ];
 }
```

Este código, nos generará un campo númerico con seis decimales. Podemos indicar que queremos que nos calcule la coordenada en grados, minutos y segundos, para ello, debemos indicar la conversión, y si el campo es de latitud o longitud:

```php
use Daguilarm\Belich\Fields\Types\Coordenates;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Coordenates::make('Lat', 'lat_coordenates')
            ->toDegrees('lat'),
    ];
}
```

Esto es necesario para determinar la componente cardinal de la coordenada: N, S, E u O. El campo `toDegrees()` acepta los valores:

- lat
- latitude 
- lng 
- longitude

![Coordenadas](../../images/fields/coordenate.png)
<div id="legend"><b>fig 3</b>: Ejemplo de campo para coordenadas</div>

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>

### Countries

Este campo nos permite listar los paises del mundo, mediante un campo autocompletado, usando la etiqueta `<datalist></datalist>`. Es un alias de `Autocomplete()`, al que se le inyecta directamente un archivo de idioma.

A partir del archivo de idioma ubicado en `./resources/lang/vendor/belich/metrics.php`, obtenemos un array con los paises y con el siguiente formato:

```php
    ['code' => 'ES', 'name' => 'Spain'],
    ['code' => 'US', 'name' => 'United States'],
    ...
```

?>Por supuesto, se puede modificar este archivo de idioma, y por tanto, ampliar o cambiar cualquier nombre o código.

El sistema convertirá el `array` anterior con los paises, en un `array` listo para ser usuado por el campo `<datalist></datalist>`:

```php
    ['ES' => 'Spain'],
    ['US' => 'United States'],
    ...
```

El funcionamiento, será:

```php
use Daguilarm\Belich\Fields\Types\Countries;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Countries::make('Countries', 'billing_country'),
    ];
}
```

Mostrando:

![Countries example](../../images/fields/countries.png)
<div id="legend"><b>fig 4</b>: Ejemplo de campo para paises</div>

?>El campo `Country` no soporta los métodos: `prefix()`, `sufix()` y `displayUsing()`.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>autofocus()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Campo Date 

Nos creará un campo para para gestionar fechas. Este campo automáticamente se encarga de gestionar el formato adecuado para ser almacenado en la base de datos, y nos permite definir el formato en el que queremos mostrar la fecha:

```php
use Daguilarm\Belich\Fields\Types\Date;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Date::make('Date', 'billing_date')
            ->format('d/m/Y'),
    ];
}
```

?>Si no indicamos el formato, utilizará el predefinido en el archivo `./config/belich.php`

?>Este campo se guarda automáticamente como objeto `Carbon\Carbon`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>asHtml()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Campo Decimal 

Nos genera un campo decimal (float), pero en el que podemos limitar el número de decimales:

```php
use Daguilarm\Belich\Fields\Types\Decimal;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Decimal::make('Price', 'price')
            ->decimals(4),
    ];
}
```

?>Si no indicamos un número de decimales, el valor por defecto es: 2.

?>Este campo se guarda automáticamente como `float`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Campo Email 

El campo email nos permite generar un campo `HTML5` de email. El funcionamiento, sería el siguiente:

```php
use Daguilarm\Belich\Fields\Types\Email;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Email::make('Hellow world'),
    ];
}
```
Mostrando:

```html
<input type="email" name="myEmail" id="myEmail" dusk="dusk-myEmail">
```

Al igual que los campos: `File` y `Image`, dispone del método `multiple()`, que le permite añadir multiples direcciones de email, separadas por coma.

```php
use Daguilarm\Belich\Fields\Types\Email;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Email::make('Hellow world')
            ->multiple(),
    ];
}
```

### Campo Header 

Nos permite añadir un título en el formulario para separar conceptos o añadir información adicional.

```php
use Daguilarm\Belich\Fields\Types\Header;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Header::make('Hellow world'),
    ];
}
```

Por defecto, el código `hmtl` que mostrará, será:

```html
<div class="w-full items-center py-5 px-6 font-bold text-gray-600 bg-gray-200">Hellow world</div>
```

En la figura 5, podemos ver un ejemplo, donde se muestra el texto: *Personal data*.

Podemos personalizar los colores de forma sencilla, usando los métodos:

- `color()`: para el color del texto.
- `background()`: para el color de fondo.

```php
use Daguilarm\Belich\Fields\Types\Header;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Header::make('Hellow world')
            ->background('red-500')
            ->color('white'),
    ];
}
```

?>Los colores soportados son: black, white, red, yellow, blue, green, orange y teal, con sus respectivos grados de color. Ej: red-400, white, blue-800,...

También podemos añadir nuestro propio código `html`:

```php
use Daguilarm\Belich\Facades\Helper;
use Daguilarm\Belich\Fields\Types\Header;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Header::make('<h1 class="bg-gray-200 text-gray-700 p-5">' . Helper::icon('envelope-open-text') . ' Email</h1>')
            ->asHtml(),
    ];
}
```

Hay que utilizar el método `asHtml()` para no escapar el código, y que se renderice correctamente.

Un ejemplo de como quedarían los campos **Header**:

![Header example](../../images/fields/header.png)
<div id="legend"><b>fig 5</b>: Ejemplo de campo header personalizado</div>

Este campo solo es accesible desde las vistas `edit` y `create`. Pero podemos añadir la vista show `show`, usando: 

```php
Header::make('My header title')->visibleOn('show');
```

### Campo Hidden 

El campo `hidden`, nos permite añadir campos ocultos, para enviar información extra a la base de datos.

Este campo, sólo se muestra en las vistas de formularios: `create` y `edit`. Un ejemplo de uso, sería:

```php
Hidden::make('Hidden item', 'test_email'),
```

Como el resto de campos de formulario, soporta una serie de métodos que le permiten modificar sus valores. 

Los métodos soportados son:

```php
Hidden::make('Hidden item', 'test_email')
    ->id('testing_id')
    ->name('testing-name')
    ->data('test', 'testing-data')
    ->dusk('testing-dusk')
    ->defaultValue('testing-value')
    ->disabled(),
```

El resto de métodos, como: `addClass()`, `readonly()`,etc... no tienen sentido y han sido deshabilitados.

### Campo ID 

Nos permite visualizar en las vistas: `index` y `show` el valor del campo Id de la tabla.

```php
use Daguilarm\Belich\Fields\Types\ID;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        ID::make('Id'),
    ];
}
```

Por supuesto, si el nombre del campo en la tabla, es diferente al valor por defecto: `id`, podemos especificarlo:

```php
use Daguilarm\Belich\Fields\Types\ID;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        ID::make('Id', 'myCustomId'),
    ];
}
```

?>Es solo un campo de visualización. No puede ser modificado y por tanto, no permite métodos adicionales, como el resto de campos de formulario.


### Campo Markdown

El campo markdown, nos permite almacenar en la base de datos, textos formateados mediante este sistema. Su funcionamiento es el siguiente:

```php
use Daguilarm\Belich\Fields\Types\Markdown;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Markdown::make('Markdown field', 'blog_description'),
    ];
}
```

Por defecto, este campo no muestra la vista `index`, pero si consideramos que es necesario, podemos añadir el método:

```php
use Daguilarm\Belich\Fields\Types\Markdown;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Markdown::make('Markdown field', 'blog_description')
            ->showOnIndex(),
    ];
}
```

Por defecto, en las vistas `index` y `show`, se muestra una versión acortada del texto, por lo que si queremos que se muestre el texto completo, tendremos que utilizar los métodos:

- `fullText()`: muestra el texto completo en las dos vistas.
- `fullTextOnIndex()`: muestra el texto completo solo en la vista `index`.
- `fullTextOnShow()`: muestra el texto completo solo en la vista `show`.
- `fullTextOnDetail()`: es un alias del anterior.

También podemos mostrar una preview de nuestro código en las vistas: `create` y `edit`:

```php
use Daguilarm\Belich\Fields\Types\Markdown;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Markdown::make('Markdown field', 'blog_description')
            ->preview(),
    ];
}
```

Mostrando lo siguiente:

![Markdown example](../../images/fields/markdown.png)
<div id="legend"><b>fig 7</b>: Ejemplo de campo Markdown con preview</div>

### Campo Number 

Genera un campo number con las opciones: `min()`, `max()` y `step()`:

```php
use Daguilarm\Belich\Fields\Types\Number;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Number::make('Money', 'money')
            ->min(1)
            ->max(10000)
            ->step(1),
    ];
}
```

### Campo Range 

Es un alias para la general un campo `HTML5` range. Funciona igual que un campo: `Number`, que se explicará en el siguiente punto. A modo de ejemplo:

```php
use Daguilarm\Belich\Fields\Types\Range;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Range::make('Money', 'money')
            ->min(1)
            ->max(10000)
            ->step(1),
    ];
}
```

También disponemos del método `options()`, que nos permite enviar un array de valores:

```php
use Daguilarm\Belich\Fields\Types\Range;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Range::make('Money', 'money')
            ->step(10)
            ->options(['0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100']),
    ];
}
```
En este caso, no hay que enviar el valor mínimo ni el máximo, simplemente el intervalo de valores y el rando, aunque realmente, el valor: `step()`, ni siquiera sería necesario. A continuación, veamos como quedarían los dos ejemplos anteriores:

![Range example](../../images/fields/range.png)
<div id="legend"><b>fig 6</b>: Ejemplo de campos range</div>

?>De momento, el uso del método: `options()`, no está soportando por todos los navegadores, por lo que su visualización, dependerá de esto. Mas información en: [Campo range](https://developer.mozilla.org/es/docs/Web/HTML/Elemento/input/range)

### Campo Select

El campo select incluye el método `options()`, el cual nos permite añadir valores a la etiqueta `option` del attributo `select`, tal y como se muestra a continuación:

```php
use Daguilarm\Belich\Fields\Types\Select;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Select::make('Role', 'role')
            ->options([
                1 => 'Admin', 
                2 => 'Manager', 
                3 => 'User'
            ])
            ->defaultValue(1)
    ];
}
```

Si necesitamos añadir valores desde la base de datos, podemos user el método `__contructor`:

```php
/**
 * List of emails from users
 *
 * @var array
 */
protected $selectNames;

/**
 * Generate constructor for the resource
 *
 * @return void
 */
public function __construct()
{
    //Getting data from storage to populate the field
    $this->selectNames = \App\User::pluck('name', 'id')->toArray();
}

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Select::make('Role', 'role')
            ->options($this->selectNames),
    ]
}
```

También podemos mostrar en las vistas `index` y `show`, el resultado como valor, en vez de como clave. Por ejemplo:

```php
[
    1 => 'Admin', 
    2 => 'Manager', 
    3 => 'User'
]
```

En la base de datos, guardaríamos el valor de la clave: `1`, y por tanto, en las vistas `index` y `show`, cuando mostremos el valor de este campo, nos mostrará `1` en lugar de `Admin`. Para solucionarlo, disponemos del método `displayUsingLabels()`:

```php
use Daguilarm\Belich\Fields\Types\Select;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Select::make('Role', 'role')
            ->options([
                1 => 'Admin', 
                2 => 'Manager', 
                3 => 'User'
            ])
            ->displayUsingLabels()
    ];
}
```

Este método mostrará en las vistas: `index` y `show`, el resultado `Admin`, mientras que la vista `edit`, asignará el valor `1`, haciendo que nuestro campo `select`, funcione correctamente.

### Campo Text

Este campo adminite los siguientes métodos especiales:

- `withRelationship()`

El campo `withRelationship()`, se utiliza para mostrar en las vistas: `index`, `show`, `edit`, información de una tabla relacional.

?>Debe utilizarse sólo para mostrar información, nunca para crear o actualizar, para ello, disponemos de campos relacionales

Por ejemplo, si nuestra tabla tiene información sobre vehículos, y disponemos de otra con información de la ubicación GPS del vehículo, en este caso, no queremos que el usuario pueda modificar la información GPS, ya que se actualiza de forma automática, pero si queremos mostrarla. Es en estos casos, cuando puede utilizarse un campo `Text` con relaciones.

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
        Text::make('GPS', 'gps_location')
            ->withRelationship('location'),
    ]
}
```

El ejemplo anterior, buscará la información `$field->location->gps_location`. 

Este campo se mostrará en las vistas: `index` y `show`, se le añadirá el attributo `disabled` en la vista `edit` y se eliminará de la vista: `create`.

Para evitar problemas n+1, debemos añadir la relación al modelo. Para ello, al definir el modelo de nuestro recurso, debemos hacer lo siguiente:

```php
/** @var string [Model path] */
public static $model = '\App\Models\Car';

/** @var array */
public static $relationships = ['location'];
```

?>Este campo se guarda automáticamente como `string`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.

### Campo TextArea 

Nos permite crear un campo de formulario: `textarea`. A continuación, un ejemplo mostrando todas las opciones posibles para poder ser comentadas una a una:

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
        TextArea::make('Telephone', 'user_telephone')
            ->count(200)
            ->rows(6)
            ->fullText()
            ->rules('required')
            ->addClass('testing-class'),
    ]
}
```

El campo `textarea`, soporta los siguientes métodos:

- `fullText()`: Por defecto, las áreas de texto, muestran una cadena de texto acortado, utilizando javascript para mostrar el texto completo. Si quiere que el texto se muestre íntegro, por defecto, debe añadir este método. 
- `fullTextOnIndex()`: El texto se muestra completo en la vista: `index`, pero parcial en la vista: `show`.
- `fullTextOnShow()`: El texto se muestra completo en la vista: `show`, pero parcial en la vista: `index`.
- `maxlength()`: Nos permite definir el número máximo de caracteres del campo.
- `count()`: Igual que `maxlength()`, pero además, muestra bajo el campo, el número de caracteres restantes hasta llegar al número máximo (figura 6).
- `rows()`: nos permite definir el número de filas o líneas que tendrá nuestra área de texto.

![TextArea example](../../images/fields/textarea.png)
<div id="legend"><b>fig 7</b>: Ejemplo de textarea con caracteres restantes</div>

?>Este campo se guarda automáticamente como `string`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.

<div class="tip">
    <b>Métodos no recomendados</b> (O no funcionan o no tiene sentido utilizarlos)
    <u>
        <li>defaultValue()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing()</li>
        <li>suffix()</li>
    </u>
</div>

### Campo Time

Es un alias para el campo `HTML5` time. Su funcionamiento básico es el siguiente:

```php
use Daguilarm\Belich\Fields\Types\Time;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Time::make('Time', 'time')
            ->min('09:00')
            ->max('22:00')
            ->step(1),
    ];
}
```

Permite los campos:

- `min()`, para determinar el valor mínimo.
- `max()`, para determinar el valor máximo.
- `step()`, el intervalo de incremento del valor.


### Campo Year 

Nos creará un campo para para gestionar fechas, usando el formato de `sql` para años, es decir, un campo `integer` de cuatro caracteres. Belich autináticamente validará el formato al añadir el campo, usando `Carbon\Carbon`.

```php
use Daguilarm\Belich\Fields\Types\Year;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Year::make('Year', 'billing_year'),
    ];
}
```

?>Este campo se guarda automáticamente como objeto `Carbon\Carbon`. Puede consultar la sección [Tipos](/es/fields/cats.md) para modificar el valor.
