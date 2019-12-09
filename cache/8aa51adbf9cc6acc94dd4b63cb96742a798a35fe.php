<?php $__env->startSection('content'); ?><h1>Chart Facade: mostrar gráfica</h1>
<p>La forma de mostrar una gráfica en nuestro <em>template</em> <strong>Blade</strong>, es de la siguiente manera:</p>
<pre><code class="language-php">{!! Chart::render($request) !!}</code></pre>
<p><strong>Belich</strong> ya realiza esta operación por defecto, de hecho, hace esta llamada en el template ubicado en <code>resources\views\vendor\belich\dashboard\index.blade.php</code>.</p>
<p>En caso de necesitar generar nuestras propias gráficas, sólo tendremos que llamar al método <code>render()</code> y pasarle la variable <code>$request</code>, tal y como se ha mostrado en el ejemplo anterior. </p>
<p>Si disponemos de nuestra propia lógica, debemos tener en cuenta que el sistema buscará en la variable <code>$request</code>, el objecto <code>$request-&gt;metrics</code>, por lo tanto debemos incluirlo.</p>
<p>A modo de ejemplo y para entender mejor el funcionamiento del método <code>render()</code>, se muestra el código que se ejecuta en el método:</p>
<pre><code class="language-php">/**
 * Render the metric card
 *
 * <?php echo e('@'); ?>param  \Illuminate\Http\Request  $request
 * <?php echo e('@'); ?>return string
 */
public function render(Request $request) : string
{
    //Render the metric view
    $metrics = collect($request-&gt;metrics)
        -&gt;map(function($metric) {
            return view(
                'belich::components.metrics.chart', 
                compact('metric')
            )-&gt;render();
        });

    return $this-&gt;hasResults($metrics);
}</code></pre>
<p>El método <code>hasResults()</code>, simplemente verifica que existe la gráfica, y si es así, la envia a la vista.</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>