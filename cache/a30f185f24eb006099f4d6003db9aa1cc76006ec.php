<?php $__env->startSection('content'); ?><h1>Etiquetas para gráficas</h1>
<p><strong>Belich</strong> incluye una serie de etiquetas predeterminadas y basadas en la localización de <strong>Laravel</strong>, y que pueden ser traducidas.</p>
<p>Este archivo se encuentra en:</p>
<pre><code>\resources\lang\vendor\belich\en\metrics.php</code></pre>
<p>Y por tanto, puede crearse el archivo:</p>
<pre><code>\resources\lang\vendor\belich\es\metrics.php</code></pre>
<p>Con su respectiva traducción al Castellano. A modo de ejemplo, la utilización de este <em>helper</em>, sería de la siguiente forma:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Set the displayable labels
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek();
}</code></pre>
<p>Que devolvería un array con:</p>
<pre><code class="language-php">Array
(
    [0] =&gt; 'monday'
    [1] =&gt; 'tuesday'
    [2] =&gt; 'wednesday'
    [3] =&gt; 'thursday'
    [4] =&gt; 'friday'
    [5] =&gt; 'saturday'
    [6] =&gt; 'sunday'
)</code></pre>
<p>El cual puede ser utilizado directamente por las gráficas. Veamos a continuación la lista de etiquetas predeterminadas por <strong>Belich</strong>.</p>
<h3> Métodos soportados</h3>
<ul>
<li><code>countriesOfTheWorld()</code>: Devuelve un array con todos los nombres de los paises del mundo.</li>
<li><code>daysOfTheWeek()</code>: Devuelve un array con los nombres de los días de la semana.</li>
<li><code>daysOfTheWeekMin()</code>: Devuelve un array con los nombres de días de la semana (usando abreviaciones).</li>
<li><code>daysOfTheMonth()</code>: Devuelve un array con los días del mes: de 1 a (28, 29, 30 o 31).</li>
<li><code>hoursOfTheday()</code>: Devuelve un array con valores de 1 a 24.</li>
<li><code>monthsOfTheYear()</code>: Devuelve un array con los nombres de los meses del año.</li>
<li><code>monthsOfTheYearMin()</code>: Devuelve un array con los nombres de los meses del año (usando abreviaciones).</li>
<li><code>listOfYears()</code>: Devuelve un array con los años en función del año inicial.</li>
</ul>
<p>Agunos ejemplos:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek();
}

//Will return
['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']</code></pre>
<p>Veamos el ejemplo que puede crear más dudas:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::listOfYears(3);
}

//Will return if today is 2019
[2017, 2018, 2019]</code></pre>
<p>Le hemos indicado que nos devuelva un array con los tres últimos años.</p>
<p>Todos los métodos devuelven <em>arrays</em>, pero aquellos que el <em>array</em> contiene texto (<em>strings</em>) y no números, puede ser formateado. Estos métodos, como por ejemplo: <code>Labels::daysOfTheWeek()</code>, admiten un parámetro adicional:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Get the values from storage
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheWeek('capitalize');
}

//Will return if today is 2019
['MONDAY', 'TUESDAY', ...]</code></pre>
<p>Es decir, podemos formatear la salida del array. Las opciones soportadas son:</p>
<ul>
<li><strong>capitalize</strong>: nos devolverá el texto en mayúsculas.</li>
<li><strong>lower</strong>: nos devolverá el texto en minúculas.</li>
<li><strong>title</strong>:  nos devolverá el texto con la primera letra capitalizada (ucfirst). Esta es la opción por defecto.</li>
</ul><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>