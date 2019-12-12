<?php $__env->startSection('content'); ?><h1>Gráficas y estadísticas</h1>
<p>Para la visualización de gráficas, se ha optado por la librería <a href="https://gionkunz.github.io/chartist-js/index.html" class="link-out">ChartistJS</a>, una opción muy ligera, completa y funcional.</p>
<p><strong>Belich</strong> permite configurar gráficas de forma sencilla y rápida, utilizando para ello, el terminal:</p>
<pre><code class="language-php">php artisan belich:metric MetricName</code></pre>
<p>Generando un archivo en la ubicación: <code>App\Belich\Metics</code>. En este archivo, encontraremos dos variables para definir:</p>
<pre><code class="language-php">//app\Belich\Metrics\MetricName.php

/** <?php echo e('@'); ?>var string */
public $type = 'bars';

/** <?php echo e('@'); ?>var string */
public $width = 'w-1/3';</code></pre>
<p>Aunque, como veremos después, <strong>Belich</strong> nos ofrecerá una gama de variables para configurar bastante más amplia. Aspecto que posteriormente desarrollaremos con más detenimiento. </p>
<h2> Variables</h2>
<p>Empecemos por las variables <code>$type</code> y <code>$with</code>, que hemos mencionado anteriormente:</p>
<h3>a) type</h3>
<p>Nos permite indicar el tipo de gráfica que queremos mostrar, las opciones disponibles son:</p>
<ul>
<li>line</li>
<li>bars</li>
<li>horizontal-bars</li>
<li>pie (en desarrollo)</li>
</ul>
<p><img src="../../../assets/images/metrics/graph-types.png" alt="Metrics types" /></p>
<div id="legend"><b>fig 1</b>: Tipos de gráficas</div>
<p>En la <em>figura 1</em>, podemos ver de izquierda a derecha, una gráfica <code>horizontal-bars</code>, otra <code>line</code> y la última: <code>bars</code>.</p>
<blockquote>
<p>Las gráficas de <code>pie</code> o gráfico circular, está disponibles solo como opción muy básica, ya que de forma nativa no está demasiado desarrollada.</p>
</blockquote>
<h3>b) width</h3>
<p>Indica el ancho de la gráfica. Para ello, se utilizan las opciones que ofrece la librería <a href="https://www.tailwindcss.com" class="link-out">tailwindcss</a>, y por tanto, las más utilizadas en nuestros proyectos van a ser:</p>
<ul>
<li>w-1/3</li>
<li>w-2/3</li>
<li>w-full</li>
</ul>
<blockquote>
<p>Por supuesto, puedes crear tus propias clases CSS e incluirlas.</p>
</blockquote>
<p>También se puede usar el método <code>width()</code> para asignar el ancho. Para más información consulte aqui: <a href="../resources/mandatory-methods#width">Mas información</a>.</p>
<p>El resto de variables que podemos utilizar, y que no están por defecto en el archivo que ha generado <strong>Belich</strong>, son:</p>
<h3>color</h3>
<p>Nos permite definir un color genérico básico para todo nuestro gráfico, de forma que <strong>Belich</strong> asignará las diferentes tonalidades del color, a las diferentes partes del gráfico.</p>
<p>El formato para el color, debe utilizarse el nombre del mismo, a partir de la lista de colores soportados por tailwindcss. Por ejemplo: <code>teal</code>, <code>red</code>, <code>yellow</code>,...</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public $color = 'red';</code></pre>
<div class="blockquote-alert"><strong>Recuerde</strong>: solo el nombre, no la intensidad. No utilice: <code>teal-500</code>, use: <code>teal</code>, porque estamos definiendo la plantilla de color, no un color específico.
</div>
<p>Si lo desea, puede utilizar colores hexadecimales o rgb, pero solo aceptarán al gráfico, dejando el resto de valores: el título, la legenda, las etiquetas,... con los valores predeterminados... ¿no parece la mejor opción, no?</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public $color = '#999999';

/** <?php echo e('@'); ?>var string */
public $color = 'rgb(238, 241, 244)';</code></pre>
<h3>defineColors</h3>
<p>Sirve para definir los colores concretos de cada parte del gráfico. En este caso, solo se permiten los nombres del color, o se utilizarán los valores por defecto. </p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var array ['area-color', 'line-color', 'title-color', 'legend-color'] */
public $defineColors = [
    'title-color'  =&gt; 'green', 
    'legend-color' =&gt; 'orange',
    'line-color'   =&gt; 'blue', 
    'label-color'  =&gt; 'blue',//This is for pie graph
    'area-color'   =&gt; 'red', 
]</code></pre>
<div class="blockquote-alert"><strong>Recuerde</strong>: solo el nombre, no la intensidad. No utilice: <code>teal-500</code>, en su lugar, use: <code>teal</code>, el sistema añadirá la intensidad automáticamente en función del campo.</div>
<p>Ambas variables: <code>$color</code> y <code>$defineColors</code> son compatibles, podemos definir un color general y luego matizar una parte del gráfico:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public $color = 'red';

/** <?php echo e('@'); ?>var array */
public $defineColors = [
    'title-color'  =&gt; 'green', 
]</code></pre>
<p>Los cuatro parámetros que permite son:</p>
<ul>
<li><strong>title-color</strong>: el color del título de la gráfica.</li>
<li><strong>legend-color</strong>: el color base para la leyenda.</li>
<li><strong>line-color</strong>: el color de la gráfica.</li>
<li><strong>area-color</strong>: si nuestra gráfica tiene la opción de mostrar área, podemos asignarle un color al área.</li>
</ul>
<h3>grid</h3>
<p>Por defecto, nuestra gráfica mostrará el <code>grid</code> para ver mejor los datos. Podemos deshabilitarlo de la siguiente forma:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var bool */
public $grid = false;</code></pre>
<p>En la figura 1, se puede ver que las dos primeras gráficas tienen <code>grid</code> y la última (barras horizontales) no lo tiene.</p>
<h3>legend_h</h3>
<p>Podemos asignar un nombre para la barra X (abscisas), y por tanto, crear un cuadro de leyenda.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public $legend_h = 'Days';</code></pre>
<h3>legend_y</h3>
<p>Podemos asignar un nombre para la barra Y (ordenadas), y por tanto, crear un cuadro de leyenda.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public $legend_y = 'Active users';</code></pre>
<h3>marker</h3>
<p>Podemos asignar un marcador para cada punto de la gráfica (gráficas lineales). Por defecto, el sistema lo tiene deshabilitado, pero podemos asignarle los siguientes:</p>
<ul>
<li><strong>butt</strong>: Valor por defecto. Deshabilitar marcador.</li>
<li><strong>square</strong>: Muestra un cuadrado.</li>
<li><strong>round</strong>: Muestra un circulo.</li>
</ul>
<p><img src="../../../assets/images/metrics/graph-markers.png" alt="Metrics types" /></p>
<div id="legend"><b>fig 2</b>: Tipos de marcadores</div>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string ['butt', 'square', 'round'] */
public $marker = 'square';</code></pre>
<h2>Métodos</h2>
<p><strong>Belich</strong> dispone de varios métodos que debemos utilizar en nuestras gráficas, es decir, son obligatorios:</p>
<h3>calculate</h3>
<p>Obtiene los resultados para mostrar en la gráfica a partir de la base de datos:</p>
<pre><code class="language-php">/**
 * Get the values from storage
 *
 * <?php echo e('@'); ?>return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        -&gt;lastYear()
        -&gt;totalByMonth();
}</code></pre>
<p>Las opciones de configuración, vienen explicadas en el apartado: <a href="metrics-calculate">Cálculos con gráficas</a>. </p>
<h3>Labels</h3>
<p>Define las etiquetas para la gráfica.</p>
<pre><code class="language-php">/**
 * Set the displayable labels
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return ['Monday',...];
}</code></pre>
<p>Pueden ser personalizadas por el usuario (recordando siempre que debe devolverse un array), o utilizar la librería de creación de etiquetas de <strong>Belich</strong>, la cual se explica en su propio apartado <a href="metrics-labels">Etiquetas para gráficas</a>. </p>
<p>A continuación se puede ver un ejemplo:</p>
<pre><code class="language-php">use Daguilarm\Belich\Components\Metrics\Labels;

/**
 * Set the displayable labels
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheMonth();
}</code></pre>
<h3>name</h3>
<p>Es el nombre de la gráfica.</p>
<pre><code class="language-php">/**
 * Set the displayable name of the metric.
 *
 * <?php echo e('@'); ?>return string
 */
public function name(Request $request)
{
    return $this-&gt;name = 'Users per month';
}</code></pre>
<h3>uriKey</h3>
<p>Nos permite definir nuestra gráfica con un identificador para cada una de ellas. Este parámetro se genera de forma automática al crear la gráfica con <code>artisan</code>, aunque puede ser modificado.</p>
<blockquote>
<p>Posibles errores en la visualización de gráficas: comprobar que no tengan el mismo <code>uriKey</code>.</p>
</blockquote>
<pre><code class="language-php">
/**
 * Get the URI key for the metric.
 *
 * <?php echo e('@'); ?>return string
 */
public function uriKey()
{
    return 'users-per-month';
}
``</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>