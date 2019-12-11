---
title: Dashboard
description: Managing Dashboard or Home Page
extends: _layouts.documentation
section: content
locate: en
folder: views
---

# Dashboard

The homepage of **Belich** is located at: `resources/views/vendor/belich/dashboard.blade.php`, this page will allow us to add components or anything we need.

The route assigned for this view is in `app\Belich\Routes.php`, and has the following default code:

```php 
// app\Belich\Routes.php

/*
|--------------------------------------------------------------------------
| Define your coustom routes
|--------------------------------------------------------------------------
*/

// Dashboard / Home route
Route::get(Belich::path(), '\App\Belich\Dashboard');
```

The *Blade* template has this default configuration:

```php 
// resources/views/vendor/belich/dashboard.blade.php

@extends('belich::layout')

@section('content')
    <div class="flex flex-wrap my-8 mx-6 p-4 rounded bg-white {{ config('belich.navbar') === 'top' ? 'shadow-md' : '' }}">

        {{-- Calendar --}}
        <belich::calendar width="w-1/3"></belich::calendar>

        {{-- Model to table --}}
        <belich::model :columns="['id', 'name', 'email']" :model="app(\App\User::class)" width="w-2/3" limit="10" ></belich::model>

    </div>
@endsection
```

In the folder `resources/views/vendor/belich/components/tools`, will find some default components, such as the **calendar** or the **table builder from models**. This folder will be an excellent place to add our own components o *Tools*.

>These two components are those that can be found on the default page after the installation.

There is also a controller that will allow us to inject code directly into view. The controller can be found in: `app\Belich\Dashboard.php`, is created during installation, and looks like this:

```php 
// app\Belich\Dashboard.php

namespace App\Belich;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Dashboard extends Controller
{
    /**
     * Create a Dashboard/Home controller instance.
     *
     * @return Illuminate\Support\Facades\View
     */
    public function __invoke(): View
    {
        return view('belich::dashboard');
    }
}
```

Very easy to configure and adapt to our needs.
