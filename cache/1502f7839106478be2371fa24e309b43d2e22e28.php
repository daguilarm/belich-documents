<?php $__env->startSection('content'); ?><h1>Caché para gráficas</h1>
<p>Para asignar el caché, se ha optado por un <em>helper</em>, principalmente pensando en los cambios en la caché que se integraron en <strong>Laravel 5.8</strong>.</p>
<p>La utilización del <em>helper</em>, nos va a permitir guardar todos los datos como un objeto <code>Carbon\Carbon</code>, y poder utilizar el formato que más nos guste: segundos, minutos, horas,...</p>
<p>Todos los métodos, necesitan dos parámetros: </p>
<ul>
<li>La cantidad de tiempo. </li>
<li>Una clave única. </li>
</ul>
<blockquote>
<p>La mejor opción para la clave única, es pasar la <code>$this-&gt;uriKey()</code> de la gráfica, pero se puede utilizar la que más convenga.</p>
</blockquote>
<p>Se debe incluir en el método <a href="metrics-calculate">calculate()</a>:</p>
<pre><code class="language-php">/**
 * Make calculations
 *
 * <?php echo e('@'); ?>return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        -&gt;cacheInMinutes(10, $this-&gt;uriKey())
        -&gt;lastMonth()
        -&gt;totalByDay();
}</code></pre>
<p>Los métodos disponibles para gestionar la caché, son:</p>
<ul>
<li><code>cacheForEver()</code></li>
<li><code>cacheInMinutes(int $minutes, string $key)</code></li>
<li><code>cacheInHours(int $hours, string $key)</code></li>
<li><code>cacheInDays(int $days, string $key)</code></li>
</ul><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>