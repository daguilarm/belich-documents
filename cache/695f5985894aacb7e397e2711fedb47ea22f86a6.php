<?php $__env->startSection('content'); ?><h1>Belich facade: Recursos</h1>
<h4>accessToResource()</h4>
<p>Nos devolverá <code>true</code> o <code>false</code>, para saber si el recurso actual puede ser accedido directamente por los usuarios del sistema.</p>
<h4>currentResource()</h4>
<p>Nos devuelve la información del recurso actual, mediante una colección. Los datos que ofrece son:</p>
<ul>
<li><strong>name</strong>: El nombre de la clase pluralizado y minúscula, mediante <code>routeResource()</code>.</li>
<li><strong>controllerAction</strong>: Nos muestra la acción que se está producciendo en el <em>Controlador</em>, mediante el método <code>routeAction()</code>.</li>
<li><strong>fields</strong>: Colección con todos los valores del formulario actualizados.</li>
<li><strong>results</strong>: Colección con todos los resultados de la base de datos para el recurso. Si nos encontramos en la vista <code>index</code>, nos devolverá un listado de recurso, mientras que si nos encontramos en las vistas: <code>show</code> o <code>edit</code>, nos devolverá el valor para ese recurso en base a su ID, y si nos encontramos en <code>create</code>, será una instancia vacia del modelo.</li>
<li>
<p><strong>values</strong>: Nos devuelve un una colección con los siguientes valores:</p>
<ul>
<li><strong>class</strong>: nombre de la clase.                 </li>
<li><strong>displayInNavigation</strong>: bool.</li>
<li><strong>group</strong>: nombre del grupo al que pertenece el recurso (si aplica).        </li>
<li><strong>icon</strong>: icono (si aplica).                 </li>
<li><strong>hideMetricsForScreens</strong>: array con tamaños de pantalla a ocultar.</li>
<li><strong>label</strong>: etiqueta singular.                 </li>
<li><strong>pluralLabel</strong>: etiqueta plural.               </li>
<li><strong>resource</strong>: nombre del recurso, en minúscula y plural.             </li>
</ul>
</li>
</ul>
<h4>downloable()</h4>
<p>Nos devolverá <code>true</code> o <code>false</code>, para saber si el recurso actual puede ser exportado.</p>
<h4>redirectTo()</h4>
<p>Nos indica la ruta de redirección, despues de una acción: crear, actualizar, eliminar,...</p>
<h4>resource()</h4>
<p>Este método nos devuelve el segundo térmido de la ruta. El que pertenece al recurso actual.</p>
<p>Por ejemplo, si la ruta actual es: <code>dashboard.users.index</code>, nos devolverá <code>users</code>.</p>
<h4>resourcesAll()</h4>
<p>Nos devuelve el listado completo de recursos que se encuentra en el directorio: <code>\App\Belich\Resources\</code>, devolviendo una colección con los atributos de cada recurso.</p>
<p>Son los mismos que se obtienen desde el método <code>currentResource()</code>.</p>
<h4>resourceClassPath($className = null)</h4>
<p>Lo mismo que <code>resourceName()</code> pero con el path completo de la clase: <code>\App\Belich\Resources\User</code>.</p>
<p>Si dejamos en blanco la variable <code>$className</code>, el método, nos devolverá la clase actual.</p>
<p>Podemos añadir un nombre de clase personalizado, y nos devolverá la ruta completa de la clase.</p>
<h4>resourceName()</h4>
<p>Nos devuelve el nombre de la clase actual. Por ejemplo: <code>User</code>.</p>
<h4>resourceId()</h4>
<p>En las acciones <code>edit</code> y <code>show</code>, nos mostrará el ID del recurso actual. En el resto, devolverá el valor: <code>null</code>.</p>
<h4>resourceUrl()</h4>
<p>Nos devuelve la url completa al recurso. Por ejemplo, si estamos en el recurso: <code>User</code>, nos devolverá: <code>http://url.com/dashboard/users</code>.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>