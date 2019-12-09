<?php $__env->startSection('content'); ?><h1>Belich Facade: Rutas</h1>
<h4>action()</h4>
<p>Nos devolverá el último valor de la función <code>route</code>, es decir, la acción que se está producciendo en el <em>Controlador</em> del package. Devolverá cuatro estados por defecto:</p>
<p><code>index</code>, <code>edit</code>, <code>create</code> y <code>show</code>.</p>
<h4>actionRoute()</h4>
<p>Nos genera un enlace directo para una acción, a partir de cualquiera de las cuatro acciones soportadas y identificador del recurso. El formato sería el siguiente:</p>
<pre><code class="language-php">Belich::actionRoute($controllerAction, $data)</code></pre>
<p>A modo de ejemplo:</p>
<pre><code class="language-php">Belich::actionRoute('index')</code></pre>
<p>Nos devolvería un enlace al index del recurso actual. El segundo parámetro <code>$data</code>, podemos pasarlo de dos formas:</p>
<ul>
<li>Como objeto, obteniendo el ID a partir de él.</li>
<li>Como número entero, utilizando el ID directamente.</li>
</ul>
<p>Por ejemplo:</p>
<pre><code class="language-php">Belich::actionRoute('edit', $model)
Belich::actionRoute('edit', 201)</code></pre>
<h4>route()</h4>
<p>Las rutas de <strong>Belich</strong> se generan automáticamente con el siguiente formato: <code>dashboard.resource.action</code>. Ahora imaginemos que nuestra ruta actual es <code>dashboard.users.index</code>. El método <code>route()</code> nos devolverá un array con los tres valores de la ruta:</p>
<pre><code class="language-php">[
    'dashboard',
    'users',
    'index'
] </code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>