<?php $__env->startSection('content'); ?><h1>Chart Facade: assets</h1>
<p>El método para generar <em>assets</em> es:</p>
<pre><code class="language-php">{!! Chart::assets('js') !!}</code></pre>
<p>Podemos pasarle dos parámetros: <code>js</code> o <code>css</code>. En función del que seleccionemos, nos devolverá el código <code>HTML5</code> para cargar la última versión de la librería para gráficas utilizada por <strong>Belich</strong>.</p>
<p>A modo de ejemplo:</p>
<pre><code class="language-php">{!! Chart::assets('css') !!}</code></pre>
<p>Devolverá:</p>
<pre><code class="language-html">//Will render 
&lt;link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css"&gt;</code></pre>
<p>Y su equivalente en <code>javascript</code>:</p>
<pre><code class="language-php">{!! Chart::assets('js') !!}</code></pre>
<p>Devolverá:</p>
<pre><code class="language-html">//Will render 
&lt;script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"&gt;&lt;/script&gt;</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>