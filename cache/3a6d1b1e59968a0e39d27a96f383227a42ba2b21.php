<?php $__env->startSection('content'); ?><h1>Belich facade: Modelos</h1>
<h4>getModel()</h4>
<p>Nos devuelve una instancia del modelo, utilizado por el recurso actual.</p>
<pre><code class="language-php">Belich::getModel()</code></pre>
<h4>getModelPath()</h4>
<p>Sirve para conseguir la ruta completa al modelo, que está definida en el recurso:</p>
<pre><code class="language-php">Belich::getModelPath()

//Will return 
\App\Users::class</code></pre>
<h4>getModelKeyName()</h4>
<p>Nos devuelve la cláve primaria del modelo, por norma general será <code>id</code>.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>