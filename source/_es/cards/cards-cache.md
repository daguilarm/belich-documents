---
title: Cache de tarjetas (Cards)
description: Gestionando Cache en tarjetas (Cards)
extends: _layouts.documentation
section: content
locate: es
folder: cards
---

# Cards: Cache

La primera versión de este *package*, incluia un sistema de caché nativo, pero después de pensarlo detenidamente, se llegó a la conclusión de que iba contra la filosofía de **Belich**.

La idea de **Belich** es la de facilitar el desarrollo y dar libertad al desarrollador. Introducir un sistema de cache nativo, hubiera supuesto limitar esta libertad y encorsetar demasiado las opciones de desarrollo.

Otro aspecto que se ha tenido en cuenta, es que no siempre vamos a necesitar cachear bases de datos en nuestro controlador, y cuando sea el caso, lo mejor es simplemente implementar la caché directamente. 

Veamos un ejemplo de como hacerlo:

```php
namespace App\Belich\Cards;

use Daguilarm\Belich\Components\Cards\Card;
use Illuminate\Http\Request;

class UserCard extends Card {

    /**
     * Initialize the card
     *
     * @return string
     */
    public function __construct(Request $request)
    {
        parent::__construct();
    }

    /**
     * Return the view
     *
     * @return string
     */
    public function view() : string
    {
        return 'belich::cards.users';
    }

    /**
     * Return the view data
     *
     * @return string
     */
    public function withMeta() : array
    {
        $users = Cache::rememberForever('users', function () {
            return \App\Users::all();
        });


        return [
            'users' => $users,
        ];
    }

    /**
     * Get the URI key for the card
     *
     * @return string
     */
    public function uriKey() : string
    {
        return 'user-card';
    }
}
```

Por lo que en la *Vista*, podremos acceder a los usuarios (`$users`) a través de la variable: `$card->withMeta`.

>Seguramente, en el futuro se decida cambiar esto, pero a día de hoy, creo que es la mejor opción.
