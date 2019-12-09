<?php $__env->startSection('content'); ?><h1>Helper Facade</h1>
<p><strong>Belich</strong>, dispone de una serie de helpers que pueden ser utilizados en cualquier parte del <em>package</em> de forma directa, mediante la <em>Facade</em> <code>Helper</code>. </p>
<p>A continuación, puedrá consultar la lista de métodos soportados por <code>Helper</code>, y que tal vez, puedan ser de utilidad al desarrollador:</p>
<h4>icon()</h4>
<p>Genera un icono con texto (si aplica). La sintaxis es la siguiente:</p>
<pre><code class="language-php">Helper::icon(string $icon, $text = '', $css = '')</code></pre>
<p>Por lo que puede usarse así:</p>
<pre><code class="language-php">{!! Helper::icon($icon='trash', $text='new icon', $css='text-red') !!}

//will render 
&lt;i class="fas fa-trash mr-2 text-red"&gt;&lt;/i&gt; new icon</code></pre>
<p>Al añadir texto, automáticamente añade un margen derecho de 2 (<code>mr-2</code>).</p>
<h4>actionIcon()</h4>
<p>Exactamente igual que antes, pero sin texto. Esta pensado para los botones de acción de la tabla en la vista <code>index</code>.</p>
<pre><code class="language-php">{!! Helper::actionIcon($icon='trash') !!}

//will render 
&lt;i class="fas fa-trash"&gt;&lt;/i&gt;</code></pre>
<h4>belich_path()</h4>
<p>Genera la ruta completa a un archivo, en base la configuración de <strong>Belich</strong>. Para ello, utiliza el siguiente método:</p>
<pre><code class="language-php">/**
 * Built belich urls
 *
 * <?php echo e('@'); ?>param string|null $resource
 *
 * <?php echo e('@'); ?>return string
 */
private function belich_path(?string $resource = null): string
{
    return sprintf(
        '%s%s/%s',
        config('belich.url'),
        config('belich.path'),
        $resource
    );
}</code></pre>
<h4>emptyResults()</h4>
<p>Devuelve un <code>string</code> con el valor por defecto para cuando no hay resultados, esta valor es: <code>—</code>.</p>
<pre><code class="language-bash">HTML: &amp;mdash;
Unicode: U+2014
MacOs: ⌥ + ⇧ + -
Windows: Alt + 0151</code></pre>
<h4>gravatar()</h4>
<p>Para generar un avatar a través de la api de <a href="https://gravatar.com/site/implement/images/php/" class="link-out">Gravatar</a>.</p>
<pre><code class="language-php">/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * <?php echo e('@'); ?>param string|null $email The email address
 * <?php echo e('@'); ?>param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * <?php echo e('@'); ?>param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * <?php echo e('@'); ?>param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 *
 * <?php echo e('@'); ?>source https://gravatar.com/site/implement/images/php/
 *
 * <?php echo e('@'); ?>return  string
 */
private function gravatar(?string $email = null, int $size = 80, string $imageSet = 'mp', string $rating = 'g'): string
{
    $email = $email
        ? md5(strtolower(trim($email)))
        : auth()-&gt;user()-&gt;email;

    return sprintf($this-&gt;gravatarUrl, $email, $size, $imageSet, $rating);
}</code></pre>
<h4>hasMetrics()</h4>
<p>Nos sirve para configurar nuestro componente y determinar si el recurso ha generado gráficas, y por tanto, podemos ser capaces de incluirlas. Hay que incluir el <code>Request</code>, ya sea desde la variable <code>$request</code> o desde el helper: <code>request()</code>, ya que es en él, donde se evalua si hay gráficas o no.</p>
<pre><code class="language-php">Helper::hasMetrics($request)</code></pre>
<p>También podemos utilizar el componente para <code>Blade</code>, que es un contenedor para el helper: </p>
<pre><code class="language-php"><?php echo e('@'); ?>hasMetrics($request)</code></pre>
<h4>hasMetricsLegends()</h4>
<p>Igual que el anterior, nos indica si la gráfica tiene una leyenda (y por tanto, poder mostrala) o no.</p>
<h4>hasSoftdelete()</h4>
<p>Nos sirve para determinar si un modelo, tiene activado el <code>softDelete</code>, y por tanto, poder evaluarlo.</p>
<pre><code class="language-php">Helper::hasSoftdelete($model)</code></pre>
<p>También tiene su equivalente para <code>Blade</code>: </p>
<pre><code class="language-php"><?php echo e('@'); ?>hasSoftdelete($model)</code></pre>
<h4>hideContainerForScreens(array [])</h4>
<p>Este helper nos ayudará a crear las clases <code>CSS</code> necesarias para que un contenedor esté oculto o visible en función del tamaño de la pantalla.</p>
<p>Por ejemplo:</p>
<pre><code class="language-html">&lt;div class="{{ Helper::hideContainerForScreens(['sm', 'md']) }}"&gt;&lt;/div&gt;

//Will result 
&lt;div class="hidden lg:block xl:block"&gt;&lt;/div&gt;</code></pre>
<p>Este helper no está pensado para usarse directamente, sino como herramienta para los helpers: <code>hideCardsForScreens()</code> y <code>hideMetricsForScreens()</code>, que realizan la operación anterior, pero utilizando los valores que hemos configurado en el archivo <code>./config/belich.php</code></p>
<h4>hideCardsForScreens()</h4>
<p>Descrito anteriormente:</p>
<pre><code class="language-html">&lt;div class="{{ Helper::hideCardsForScreens() }}"&gt;&lt;/div&gt;</code></pre>
<h4>hideMetricsForScreens()</h4>
<p>Descrito anteriormente:</p>
<pre><code class="language-html">&lt;div class="{{ Helper::hideMetricsForScreens() }}"&gt;&lt;/div&gt;</code></pre>
<h4>namespace_path()</h4>
<p>Genera el namespace completo para un archivo.</p>
<pre><code class="language-php">/**
 * Get the package namespace path
 *
 * <?php echo e('@'); ?>param string $file
 *
 * <?php echo e('@'); ?>return string
 */
private function namespace_path(string $file): string
{
    return '\\Daguilarm\\Belich\\' . $file;
}</code></pre>
<h4>stringPluralLower</h4>
<p>Nos permite formatear <code>strings</code>: en este caso devuelve el plural (sólo en ingles) en minúculas:</p>
<pre><code class="language-php">Helper::stringPluralLower('HOUSE');

// Will return: houses</code></pre>
<h4>stringPluralUpper</h4>
<p>Igual que el anterior. En este caso devuelve el plural (sólo en ingles) en mayúsculas:</p>
<pre><code class="language-php">Helper::stringPluralUpper('house');

// Will return: HOUSES</code></pre>
<h4>stringSingularUpper</h4>
<p>Igual que el anterior. En este caso devuelve el singular (sólo en ingles) en mayúsculas:</p>
<pre><code class="language-php">Helper::stringSingularUpper('HOUSES');

// Will return: house</code></pre>
<h4>stringTokebab</h4>
<p>Es un alias de <code>Illuminate\Support\Str::kebab($string)</code>;</p>
<pre><code class="language-php">Helper::stringTokebab('hello world');

// Will return: hello-world</code></pre>
<h4>toRoute()</h4>
<p>Utilizado en los formularios de las vistas <code>edit</code> y <code>create</code>, para generar rápidamente las urls basadas en la acción actual.</p>
<p>Como ejemplo para la vista <code>create</code>:</p>
<pre><code class="language-html">&lt;form method="POST" action="{{ Helper::toRoute('store') }}"&gt;</code></pre>
<p>En el caso de la vista <code>edit</code>, sería:</p>
<pre><code class="language-html">&lt;form method="POST" action="{{ Helper::toRoute('update') }}"&gt;</code></pre>
<p>Obteniendo automáticamente el identificador del recurso (ID), y generando la url a partir de él.</p>
<h4>route_path()</h4>
<p>Genera la ruta parcial a un archivo, en base la configuración de <strong>Belich</strong>.</p>
<pre><code class="language-php">/**
 * Get the resource path
 *
 * <?php echo e('@'); ?>param string $file
 *
 * <?php echo e('@'); ?>return string
 */
private function route_path(string $file): string
{
    return sprintf('%s/%s', config('belich.path'), $file);
}</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>