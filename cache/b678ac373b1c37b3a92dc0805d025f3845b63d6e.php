<?php $__env->startSection('content'); ?><h1>Métodos de cálculo para gráficas</h1>
<p><strong>Belich</strong>, permite la implementación rápida de métricas, para ello, integra una serie de métodos que nos simplificarán el trabajo.</p>
<p>Para obtener los datos de una gráfica, debemos usar el método <code>calculate()</code>. Un ejemplo de uso sería:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;

/**
 * Set the displayable labels
 *
 * <?php echo e('@'); ?>return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        -&gt;cacheInMinutes(10, $this-&gt;urikey())
        -&gt;thisMonth()
        -&gt;dateTable('my_date_column')
        -&gt;totalByDay();
}</code></pre>
<blockquote>
<p>Como es lógico, podemos utilizar nuestra propia lógica para obtener los datos, simplemente hay que tener en cuenta que el resultado, deben de ser un <code>array</code>.</p>
</blockquote>
<h3>make()</h3>
<p>El método <code>make()</code>, sirve para inicializar la clase, y asignar por referencia el modelo que queremos usar.</p>
<h3>dateTable()</h3>
<p>Por defecto, este parámetro se puede dejar en blanco, y <strong>Belich</strong>, utilizará el campo <code>created_at</code> de nuestro modelo. Pero a veces es necesario utilizar otro campo para la fecha, y por eso, damos la opción de definir de forma personalizada el nombre de la columna a utilizar.</p>
<p>El resto de métodos son variables, y por tanto, los veremos agrupados por funcionalidad.</p>
<blockquote>
<p>Los métodos de caché, pueden consultarse en el apartado <a href="cache">Caché para gráficas</a></p>
</blockquote>
<h2>Determinación de fecha</h2>
<p>Nuestras gráficas predeterminadas, se basan en dos factores: el tiempo y los resultados, es decir, muestran datos en función del tiempo.</p>
<p>Para indicar los intervalos de fecha para nuestra gráfica, disponemos de dos métodos:</p>
<h3>startDate(Carbon $date)</h3>
<p>Simplemente, indicamos mediante un objecto <code>Carbon\Carbon</code> la fecha de inicio:</p>
<pre><code class="language-php">Connection::make(User::class)
    -&gt;startDate(Carbon::now()-&gt;subDays(15))</code></pre>
<h3>endDate(Carbon $date)</h3>
<p>Al igual que antes, indicamos mediante un objecto <code>Carbon\Carbon</code> la fecha de final:</p>
<pre><code class="language-php">Connection::make(User::class)
    -&gt;startDate(Carbon::now()-&gt;subDays(15))
    -&gt;endDate(Carbon::now())</code></pre>
<p>Para simplificar este trabajo de determinación de fechas (aún más), se han añadido una serie de <em>helpers</em>, que configuran las fechas por nosotros:</p>
<ul>
<li><code>toDay()</code></li>
<li><code>oneDay(int $day, int $month, int $year)</code></li>
<li><code>lastDays(int $numberOfDays)</code></li>
<li><code>thisWeek()</code></li>
<li><code>thisMonth()</code></li>
<li><code>lastMonth()</code></li>
<li><code>lastMonths(int $numberOfMonths)</code></li>
<li><code>thisYear()</code></li>
<li><code>lastYear()</code></li>
<li><code>lastYears(int $numberOfYears)</code></li>
</ul>
<p>Estas clases, lo que realmente hacen es:</p>
<pre><code class="language-php">/**
 * Set last month for the query
 *
 * <?php echo e('@'); ?>return self
 */
public function lastMonth() : self
{
    $this-&gt;startDate = static::getFirstDayOfTheLastMonth()-&gt;startOfDay();
    $this-&gt;endDate   = static::getLastDayOfTheLastMonth()-&gt;endOfDay();

    return $this;
}</code></pre>
<h2>Determinación del valor</h2>
<p>Para calcular el resultado del modelo, disponemos de los siguientes <em>helpers</em>:</p>
<ul>
<li>totalByHour()</li>
<li>totalByDay()</li>
<li>totalByMonth()</li>
<li>totalByYears()</li>
</ul>
<p>Próximamente, más opciones...</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>