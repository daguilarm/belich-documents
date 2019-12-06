# Página de inicio / Dashboard

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

La plantilla blade, tiene este aspecto:

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

En la carpeta `resources/views/vendor/belich/components/tools`, encontraremos algunos componentes por defecto, como el calendario o el constructor de tablas a partir de modelos, y este, será un buen lugar para añadir nuestros propios componentes.

También se dispone de un controlador que nos permitirá inyectar código directamente a la vista. El controlador se encuentra en: `app\Belich\Dashboard.php`, y tiene el siguiente aspecto:

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
