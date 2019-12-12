<?php $__env->startSection('content'); ?><h1>Belich Facade: Operaciones</h1>
<h4>count()</h4>
<p>Nos permite obtener el número total de resultados de un objeto o array. El formato utilizado sería:</p>
<pre><code class="language-php">Belich::count($value, int $initialValue = 0)</code></pre>
<p>La variable <code>$value</code>, sería el array u objeto a contar, permitiendo un segundo parámetro, que nos permite iniciar la cuenta en el valor que necesitemos. Por defecto, será 0. Por ejemplo:</p>
<pre><code class="language-php">Belich::count(\App\Models\User::all())
Belich::count([1, 2, 3, 4, 5])</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>