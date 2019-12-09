<?php $__env->startSection('content'); ?><h1>Belich Facade: Sistema</h1>
<h4>allowedActions()</h4>
<p>Devuelve un array con las acciones soportadas por <strong>Belich</strong>, como son (de momento):</p>
<ul>
<li>index</li>
<li>create </li>
<li>edit</li>
<li>show</li>
</ul>
<h4>middleware()</h4>
<p>Nos devuelve un <code>array</code> con todos los middlewares configurados en <code>config\belich.php</code></p>
<h4>name()</h4>
<p>Obtenemos el nombre de la aplicación del archivo de configuración: <code>.\config\belich.php</code>.</p>
<h4>path()</h4>
<p>Es el path de la aplicación. Se obtiene del archivo de configuración: <code>.\config\belich.php</code>.</p>
<h4>pathName()</h4>
<p>Si al ejecutar el método anterior: <code>path()</code> obtenemos la carpeta (por ejemplo) <code>dashboard/</code>, al llamar al método <code>pathName</code>, obtendremos <code>dashboard</code> sin la barra.</p>
<h4>url()</h4>
<p>Es la url base de la aplicación. Se obtiene del archivo de configuración: <code>.\config\belich.php</code>.</p>
<h4>version()</h4>
<p>Nos devuelve la versión actual del package.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>