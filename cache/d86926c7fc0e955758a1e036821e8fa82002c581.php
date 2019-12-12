<?php $__env->startSection('content'); ?><h1>Belich facade - blade</h1>
<p>En esta sección, encontraremos métodos para renderizar código HTML.</p>
<h2>Métodos para Blade (generando HTML)</h2>
<p>A veces necesitamos generar código HTML en Blade, y no queremos añadir código PHP a nuestro template. Para ello, se han desarrollado algunos helpers para ser utilizados de forma directa.</p>
<p>Normalmente, estos métodos son utilizados por el sistema, pero pueden ser útiles para desarrollar módulos propios, nuevos campos de formulario o packages, en cualquier caso, sirvan o no, aquí están disponibles para su uso.</p>
<p>Los métodos soportados son:</p>
<h4>value()</h4>
<p>Modifica el valor de un campo al mostrarlo en la vista. Se utiliza, cuando este campo tiene una relación (relationship), o utiliza los métodos <code>displayUsing</code> o <code>resolveUsing</code>. </p>
<p>Utiliza la siguiente sintaxis:</p>
<pre><code class="language-php">Belich::value($field, $model)</code></pre>
<p>Es utilizado por el sistema en las vistas <code>index</code> y <code>show</code>.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>