<?php $__env->startSection('content'); ?><h1>Rutas</h1>
<p>El sistema, genera automáticamente las rutas: <code>index</code>, <code>show</code>, <code>create</code>, <code>restore</code>, <code>forceDelete</code>, <code>update</code> y <code>delete</code> de cada recurso que se encuentra en el directorio <code>App\Belich\Resources</code>.</p>
<p>También se pueden añadir rutas personalizadas, desde el archivo
<code>App\Belich\Routes.php</code>. Este archivo, se genera de forma automática al instalar <strong>Belich</strong>, y tiene la siguiente configuración por defecto:</p>
<pre><code class="language-php">/*
|--------------------------------------------------------------------------
| Define your coustom routes
|--------------------------------------------------------------------------
*/

/** Belich Routes */
Route::group([
        'as' =&gt; Belich::pathName() . '.',
        'middleware' =&gt; Belich::middleware(),
    ], function () {

        //Dashboard route
        Route::get(Belich::path(), function() {
            return view('belich::pages.dashboard');
        })-&gt;name('dashboard');

        //Maybe, you can create your own controller or view and start the magic!
});</code></pre>
<p>Por lo que podemos añadir nuestras rutas personalizadas aquí.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>