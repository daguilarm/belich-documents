---
title: General field types
description: Gestión de campos de formulario generales
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# General field types

**Belich** has an extensive list of predefined fields. We have divided them into two types, the generic ones (which are the ones that we will talk about at this point), and the specific ones, which, due to their complexity or peculiarities, we have confined to their own section.

The specific fields supported by **Belich**, are:

- [Autocomplete](autocomplete)
- [File](files)
- [Image](files.md#image)
- [Panels](panels)
- [Pattern](patterns)
- [Tabs](tabs)

The generic fields supported by **Belich**, are:

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

Each field can have exclusive methods for each of them. Next, we will explain these generic methods, one by one.

>All fields that support decimals: `Decimal()`, `Number()` or `Coordenates()`, use the tag `<html lang="en">` from the web header, to use the appropriate separator: comma or period. 

### Boolean field

It allows us to generate a checkbox that supports the values: true or false.

![Boolean example - 1](../../../assets/images/fields/boolean-1.png){.mx-auto .wp-66}
<div id="legend"><b>fig 1</b>: Example of boolean field 1</div>

This field is displayed in the views `index` and `show` as follows:

![Boolean example - 2](../../../assets/images/fields/boolean-2.png){.mx-auto .wp-66}
<div id="legend"><b>fig 2</b>: Example of boolean field 2</div>

But sometimes we are interested that in these views (`index` and `show`), instead of showing an active value, a text will be displayed. Let's see an example:

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

>If both methods do not have an assigned value, neither will be displayed.

>This field is automatically saved as `bool`. You can check the section [Casts](casts) to modify this.

You can select the color of the field, the system only allows the colors: `green`, `blue` and `red`, the default value is `green`. The color variable can be assigned as follows:

```php
Boolean::make('Status', 'status')
    ->color('red'),
```

This field is editable, in the views: `edit` and `create`.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>addClass()</li>
        <li>autofocus()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>

### Color field

It is an alias for the `HTML5` color field:

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

It will show:

```html
<input class="mr-3" value="#e66465" dusk="dusk-color" id="color" name="color" type="color">
```

Another functionality of this field is that in the views: `index` and `show`, the color is displayed (as if it were `html`), instead of the code. Showing something like this:

```html
<div class="w-12 h-2 rounded" style="background-color:#a9d1bf">&nbsp;</div>
```

To do this, we will use the method: `asColor()`

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

### Coordenates field

With this field, we can add to our database the coordinates: latitude and longitude. Let's see an example:

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

This code will generate a numerical field with six decimals. We can indicate that we want the coordinate to be calculated in degrees, minutes and seconds, for this, we must indicate the conversion type, and if the field is of latitude or longitude:

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

This is necessary to determine the cardinal component of the coordinate: N, S, E or W. The `toDegrees ()` field accepts the values:

- lat
- latitude 
- lng 
- longitude

![Coordenates](../../../assets/images/fields/coordenate.png){.mx-auto}
<div id="legend"><b>fig 3</b>: Example field for coordinates</div>

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing</li>
        <li>suffix()</li>
    </u>
</div>

### Country field

This field allows us to list the countries of the world through an autocomplete field, using the `<datalist></datalist>` tag. It is an alias of the `Autocomplete()` field, which is directly injected with a language file, with the list of countries.

From the language file located in `./resources/lang/vendor/belich/metrics.php`, we get an array with the countries and the following format:

```php
    ['code' => 'ES', 'name' => 'Spain'],
    ['code' => 'US', 'name' => 'United States'],
    ...
```

>Of course, you can modify this language file, and therefore, expand or change any name or code.

The system will convert the previous `array` with the countries, into an `array` ready to be used by the field `<datalist></datalist>`:

```php
    ['ES' => 'Spain'],
    ['US' => 'United States'],
    ...
```

The code will work as follows:

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

Showing on screen:

![Countries example](../../../assets/images/fields/countries.png){.mx-auto}
<div id="legend"><b>fig 4</b>: Example: country field</div>

>The `Country` field does not support the methods: `prefix()`, `sufix()` and `displayUsing()`.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>autofocus()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Date field

We will create a field to manage dates. This field automatically takes care of managing the appropriate format to be stored in the database, and allows us to define the format in which we want to display the date:

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

>If we do not indicate the format, it will use the default value from the file: `./config/belich.php`

>This field is automatically saved as a `Carbon\Carbon` object. You can check the section [Casts](casts) to modify it.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>asHtml()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Decimal field 

It generates a decimal field (float), but in which we can limit the number of decimals:

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

>If we do not indicate a number of decimals, the default value is: 2.

>This field is automatically saved as `float`. You can check the section [Casts](casts) to modify it.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>

### Email field

The email field allows us to generate an `HTML5` email field. The operation would be as follows:

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
It will show:

```html
<input type="email" name="myEmail" id="myEmail" dusk="dusk-myEmail">
```

Like the fields: `File` and `Image`, it has the `multiple ()` method, which allows you to add multiple email addresses, separated by a comma.

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

### Header field

It allows us to add a title on the form to separate concepts or add additional information.

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

By default, the `hmtl` code that will display will be:

```html
<div class="w-full items-center py-5 px-6 font-bold text-gray-600 bg-gray-200">Hellow world</div>
```

In Figure 5 (below), we can see an example.

This field allows us to customize colors easily, using the methods:

- `color()`: for the text color.
- `background()`: for the background color.

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

>The colors supported are: black, white, red, yellow, blue, green, orange and teal, with their respective degrees of color. Ej: red-400, white, blue-800,...

We can also add our own `html` code:

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

>You have to use the `asHtml ()` method to avoid escaping the code, and to render it correctly.

An example of how the **Header** fields would look:

![Header example](../../../assets/images/fields/header.png){.mx-auto}
<div id="legend"><b>fig 5</b>: Example of custom header field</div>

This field is only accessible from the `edit` and `create` views. But we can add the `show` view, using:

```php
Header::make('My header title')->visibleOn('show');
```

### Hidden field

The `hidden` field allows us to add hidden fields, and send extra information to the database.

This field is only displayed in the form views: `create` and `edit`. An example of use would be:

```php
Hidden::make('Hidden item', 'test_email'),
```

Like the rest of the form fields, it supports a series of methods that allow you to modify its values.

The supported methods are:

```php
Hidden::make('Hidden item', 'test_email')
    ->id('testing_id')
    ->name('testing-name')
    ->data('test', 'testing-data')
    ->dusk('testing-dusk')
    ->defaultValue('testing-value')
    ->disabled(),
```

The rest of the methods, such as: `addClass()`, `readonly()`, etc ... are meaningless and have been disabled.

### ID field

It allows us to visualize in the views: `index` and `show` the value of the Id field from the table.

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

Of course, if the name of the field in the table is different from the default value: `id`, we can specify it:

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

>This is just a display field. It cannot be modified and therefore does not allow additional methods, such as other form fields.

### Markdown field

The markdown field allows us to store texts formatted using this system in the database. Its operation is as follows:

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

By default, this field does not show the `index` view, but if we consider it necessary, we can add the method:

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

By default, in the `index` and `show` views, a shortened version of the text is displayed, so if we want the full text to be displayed, we will have to use the methods:

- `fullText()`: show the full text in both views.
- `fullTextOnIndex()`: show full text only in the `index` view.
- `fullTextOnShow()`: show full text only in the `show` view.
- `fullTextOnDetail()`: It is an alias of the previous one.

We can also show a preview of our code in the views: `create` and `edit`:

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

Showing the following:

![Markdown example](../../../assets/images/fields/markdown.png){.mx-auto}
<div id="legend"><b>fig 7</b>: Markdown field example with preview</div>

### Number field

Generate a number field with the options: `min()`, `max()` and `step()`:

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

### Range field

The `HTML5` range field is an alias for the general. It works just like a field: `Number`, which will be explained in the next point. As an example:

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

We also have the `options()` method, which allows us to send an array of values:

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
In this case, you should not send the minimum or maximum value, simply the range of values and the range. Next, let's see how the two previous examples would look like:

![Range example](../../../assets/images/fields/range.png){.mx-auto}
<div id="legend"><b>fig 6</b>: Example of a range field</div>

>At the moment, the use of the method: `options ()`, is not supported by all browsers, so its display will depend on them. More information in: [Range field](https://developer.mozilla.org/es/docs/Web/HTML/Elemento/input/range)

### Select field

The select field includes the `options ()` method, which allows us to add values to the `option` tag inside the `select` field, as shown below:

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

If we need to add values from the database, we can use the method `__contructor`:

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

We can also show in the `index` and `show` views, the result as a value, rather than as a key. For example:

```php
[
    1 => 'Admin', 
    2 => 'Manager', 
    3 => 'User'
]
```

In the database, we would save the value of the key: `1`, and therefore, in the `index` and `show` views, when we show the value of this field, it will show us `1` instead of `Admin`. To solve it, we have the method `displayUsingLabels()`:

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

This method will show in the views: `index` and `show`, the result: `Admin`, while in the view `edit`, will assign the value `1`, making our field `select`, to work correctly.

### Text field

This field manages the following special methods:

- `withRelationship()`

The method: `withRelationship()`, is used to show in the views: `index`, `show` and `edit`, information from a relational table.

>It should be used only to display information, never to create or update, for this cases, we have the relational fields.

For example, imagine that our table has information on vehicles, and that we also have another table with information on the GPS location of the vehicle. What we do not want, is that the user can modify the GPS information, but what we want is to show the GPS information along with the vehicle information. 

It is in these cases, when a `Text` field with relations can be used.

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

The previous example will search for: `$field->location->gps_location`. 

This field will be shown in the views: `index` and `show`, the attribute `disabled` will be added in the `edit` view and removed from the view: `create`.

To avoid N+1 problems, we must add the relationship to the model. To do this, when defining our resource, we must do the following:

```php
/** @var string [Model path] */
public static $model = '\App\Models\Car';

/** @var array */
public static $relationships = ['location'];
```

>This field is automatically saved as `string`. You can check the section [Casts](casts) to modify it.

### TextArea field

It allows us to create a form field: `textarea`. Here is an example showing all the possible options to be commented out one by one:

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

The `textarea` field supports the following methods:

- `fullText()`: By default, text areas show a shortened text string, using javascript to display the full text. If you want the text to be displayed in full, by default, you must add this method.
- `fullTextOnIndex()`: The text is shown full in the view: `index`, but partial in the view:` show`.
- `fullTextOnShow()`: The text is shown full in the view: `show`, but partial in the view:` index`.
- `maxlength()`: It allows us to define the maximum number of characters in the field.
- `count()`: Same as `maxlength()`, but also, it shows under the field, the number of characters remaining until reaching the maximum number (figure 6).
- `rows()`: allows us to define the number of rows or lines that our text area will have.

![TextArea example](../../../assets/images/fields/textarea.png){.mx-auto}
<div id="legend"><b>fig 7</b>: Textarea example with remaining characters</div>

>This field is automatically saved as `string`. You can check the section [Casts](casts) to modify it.

<div class="blockquote-alert">
    <div class="title">
        <strong>Not recommended methods</strong> (Either they don't work or it makes no sense to use them)
    </div>
    <u>
        <li>defaultValue()</li>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>resolveUsing()</li>
        <li>suffix()</li>
    </u>
</div>

### Time field

It is an alias for the `HTML5` time field. Its basic operation is as follows:

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

Permite los métodos:

- `min()`, to determine the minimum value.
- `max()`, to determine the maximum value.
- `step()`, the range of value increase.

### Year field

A field to manage dates will be created. For this, the `sql` format for the years will be used, that is, an `integer` field with four digits.

**Belich** will automatically validate the format by adding the field, using `Carbon\Carbon`.

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

>This field is automatically saved as `Carbon\Carbon` object. You can check the section [Casts](casts) to modify it.
