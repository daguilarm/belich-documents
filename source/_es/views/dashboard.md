---
title: Dashboard / Página de inicio
description: Gestionando Dashboard o Página de inicio
extends: _layouts.documentation
section: content
locate: es
folder: views
---

# Dashboard / Página de inicio

La página de inicio de **Belich** se encuentra en: `resources/views/vendor/belich/dashboard.blade.php`, esta página nos permitirá añadir componentes o cualquier cosa que necesitemos.

La ruta asignada para esta vista, se encuentra en `app\Belich\Routes.php`, y tiene el siguiente código por defecto:

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

La plantilla *Blade*, tiene esta configuración por defecto:

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

En la carpeta `resources/views/vendor/belich/components/tools`, encontraremos algunos componentes predeterminados, como el **calendario** o el constructor de **tablas a partir de modelos**. Esta carpeta, será un lugar excelente para añadir nuestros propios componentes o *Tools*.

>Estos dos componentes, son los que se pueden encontrar en la página por defecto tras la instalación.

También se dispone de un controlador que nos permitirá inyectar código directamente a la vista. El controlador se encuentra en: `app\Belich\Dashboard.php`, es creado durante la instalación, y tiene el siguiente aspecto:

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

Muy fácil de configurar y adaptar a nuestras necesidades.
