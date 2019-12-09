---
title: Autocomplete field
description: Management of form fields for autocomplete (datalist)
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Autocomplete field

This field uses the tag `<datalist></datalist>`, to generate an autocomplete field (standard of *HTML5*).

We have two options to generate the autocomplete field:

- `array`
- `ajax`

Let's see an example:

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

the method `dataFrom()`, will allow us to add values to our field `<datalist></datalist>`.

If **Belich** detects that the content of the method `dataFrom()`, is an `array`, it will automatically inject it into the code, if not, it will try an `ajax` call:

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

In this case, we are indicating that the `ajax` response is in the route: `route('dashboard.ajax.example')`, and therefore our field `<datalist></datalist>` will be completed with the `json` response.

>Obviously, we must create the *Controller* and the necessary *route*, for generate the `json` response.

If we go back to the previous example, we can see that we have two modifying methods:

- `addVars(...$vars)`: which allows us to add variables to the url.
- `minChars()`: is the minimum number of characters for the query to fire `ajax`. By default it is in 2.

The url that would return the method `dataFrom()` (in the previous example), will be:

~~~
https://url.com/dashboard/example.php?search=searchValue&id=2093&filter=age
~~~

>As you can see, the `ajax` query uses the `search` variable. 

Let's look at the example of a controller for this `ajax` response:

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

As can be seen, it is necessary to return the values with this format:

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

and **Belich** will render it into:

```html
<datalist id="list-e9f9f0fec7514224a8a02ade19feae78">
    <option value="User 1" data-result="User 1"></option>
    <option value="User 2" data-result="User 2"></option>
</datalist>
<input type="hidden" dusk="dusk-billing_user" id="billing_user" name="billing_user" value="1">
```

Adding the `id` value to the hidden field (which will be sent to the database), while the` label` value will be displayed in the `option` attributes.

The autocomplete field, has a special behavior, with the methods: `dusk()` and `id()`, since it requires special features for its operation. Therefore, two `input` fields will be generated, the first one will be visible, and the second one will be a hidden field. Let's see an example:

```php
Autocomplete::make('Status', 'status')
    ->dataFrom(route('dashboard.ajax.example'))
    ->dusk('dusk-status')
    ->id('myID')
    ->name('myName'),
```

The first field (visible) would be like this:

```html
<input id="input-4fce0bb20fdf6f5d56f900d7782a5d90" list="list-4fce0bb20fdf6f5d56f900d7782a5d90" type="text" dusk="dusk-autocomplete-status" value="" name="myName" onkeyup="requestAjax('https://belich-dashboard.test/dashboard/ajax/example', '4fce0bb20fdf6f5d56f900d7782a5d90', '2', '');" onchange="selectDatalist('test_name', '4fce0bb20fdf6f5d56f900d7782a5d90');">
```

The `id` field is automatically generated, while the `dusk` field is modified with the `dusk-autocomplete` text.

The second field, which is hidden, will show normal behavior, at the time of naming the attributes `dusk` and `id()`:

```html
<input type="hidden" dusk="dusk-status" id="myID" name="myName" value="2">
```

>What happens if we want the value stored in the database to be the `id` field, instead of the` label` field?

The value that is stored by default (if nothing is indicated), will be: `label`, and if we wanted to change it, we have to use the method: `storeId()`, which will store the value `id` in the database.

```php
Autocomplete::make('Status', 'status')
    ->dataFrom(route('dashboard.ajax.example'))
    ->storeId(),
```

<div class="tip">
    <b>Not recommended methods</b> (Either they don't work or it makes no sense to use them)
    <u>
        <li>displayUsing()</li>
        <li>prefix()</li>
        <li>suffix()</li>
    </u>
</div>
