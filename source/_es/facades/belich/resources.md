# Belich Facade: Recursos

#### accessToResource()

Nos devolverá `true` o `false`, para saber si el recurso actual puede ser accedido directamente por los usuarios del sistema.

#### currentResource()

Nos devuelve la información del recurso actual, mediante una colección. Los datos que ofrece son:

- **name**: El nombre de la clase pluralizado y minúscula, mediante `routeResource()`.
- **controllerAction**: Nos muestra la acción que se está producciendo en el Contr*olador, mediante el método `routeAction()`.
- **fields**: Colección con todos los valores del formulario actualizados.
- **results**: Colección con todos los resultados de la base de datos para el recurso. Si nos encontramos en el `index`, nos devolverá un listado de recurso, si nos encontramos en `show` o `edit` nos devolverá el valor para ese recurso en base a su ID, y si nos encontramos en `create`, será una instancia vacia del modelo.
- **values**: Nos devuelve un una colección con los siguientes valores:

    + **class**: nombre de la clase.                 
    + **displayInNavigation**: bool.
    + **group**: nombre del grupo al que pertenece el recurso (si aplica).        
    + **icon**: icono (si aplica).                 
    + **hideMetricsForScreens**: array con tamaños de pantalla a ocultar.
    + **label**: etiqueta singular.                 
    + **pluralLabel**: etiqueta plural.               
    + **resource**: nombre del recurso, en minúscula y plural.             

#### downloable()

Nos devolverá `true` o `false`, para saber si el recurso actual puede ser exportado.

#### redirectTo()

Nos indica la ruta de redirección, despues de una acción: crear, actualizar, eliminar,...

#### resource()

Este método nos devuelve el segundo térmido de la ruta. El que pertenece al recurso actual.

Por ejemplo, si la ruta actual es: `dashboard.users.index`, nos devolverá `users`.

#### resourcesAll()

Nos devuelve el listado completo de recursos que se encuentra en el directorio: `\App\Belich\Resources\`, devolviendo una colección con los atributos de cada recurso.

Son los mismos que se obtienen desde el método `currentResource()`.

#### resourceClassPath($className = null)

Lo mismo que `resourceName()` pero con el path completo de la clase: `\App\Belich\Resources\User`.

Si dejamos en blanco la variable `$className`, el método, nos devolverá la clase actual.

Podemos añadir un nombre de clase personalizado, y nos devolverá la ruta completa de la clase.

#### resourceName()

Nos devuelve el nombre de la clase actual. Por ejemplo: `User`.

#### resourceId()

En las acciones `edit` y `show`, nos mostrará el ID del recurso actual. En el resto, devolverá el valor: `null`.

#### resourceUrl()

Nos devuelve la url completa al recurso. Por ejemplo, si estamos en el recurso: `User`, nos devolverá: `http://url.com/dashboard/users`.


