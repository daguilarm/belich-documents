<?php $__env->startSection('content'); ?><h1>Características</h1>
<ul>
<li>Barra de navegación superior o lateral.</li>
<li>Descarga directa de los recursos, en formato: EXCEL o CSV.</li>
<li>Gestión de autorización mediante <code>Policies</code>, totalmente integrada.</li>
<li>Iconos de <a href="https://origin.fontawesome.com" class="link-out">Fontawesome</a> integrados.</li>
<li>Gestión de caché.</li>
<li>Minificación de HTML (con filtros y totalmente personalizada).</li>
<li>Personalización de:
<ul>
<li>Botones de acción.</li>
<li>Barra de navegación superior.</li>
<li>Barra lateral.</li>
<li>Breadcrumbs.</li>
<li>Thumbnails.</li>
<li>Página inicial o dashboard.</li>
<li>etc...</li>
</ul></li>
<li>Gráficas:
<ul>
<li>Usando <a href="https://gionkunz.github.io/chartist-js/index.html" class="link-out">Chartist</a>, libreria ultra ligera.</li>
<li>Herramientas preconfiguradas para un desarrollo rápido.</li>
</ul></li>
</ul>
<p>A modo de ejemplo, para mostrar los usuarios registrados en la última semana, sólo tendríamos que añadir el siguiente código:</p>
<pre><code class="language-php">use App\User;
use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;
use Daguilarm\Belich\Components\Metrics\Labels;
use Illuminate\Http\Request;

/**
 * Set the displayable labels
 *
 * <?php echo e('@'); ?>return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheMonth();
}

/**
 * Calculate from model
 *
 * <?php echo e('@'); ?>return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        -&gt;cacheInMinutes(10, $this-&gt;uriKey())
        -&gt;thisWeek()
        -&gt;totalByDay();
}</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>