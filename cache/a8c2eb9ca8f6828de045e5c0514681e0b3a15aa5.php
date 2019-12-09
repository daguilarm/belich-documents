<?php $__env->startSection('content'); ?><h1>Comandos de consola</h1>
<h3>Instalar Belich</h3>
<p>Instala el package <strong>Belich</strong> en su copia de Laravel.</p>
<pre><code class="language-bash">php artisan belich:install</code></pre>
<h3>Crear recurso</h3>
<pre><code class="language-bash">php artisan belich:resource Resource</code></pre>
<blockquote>
<p>El nombre del recurso (Resource), debe de ir en singular.</p>
</blockquote>
<p>El recurso, será creado en:</p>
<pre><code class="language-php">\App\Belich\Resources\Resource;</code></pre>
<p>Se dispone de varias opciones de vonfiguración, por ejemplo, se puede especificar el la ruta del modelo, y que por tanto, sea incluida en el código:</p>
<pre><code class="language-bash">php artisan belich:resource Resource  --model='App\Models\MyModel'</code></pre>
<p>Belich, también permite crear el modelo, a la misma vez que el recurso:</p>
<pre><code class="language-bash">php artisan belich:resource Resource  --model='App\Models\MyModel' --create</code></pre>
<blockquote>
<p>Recuerde que la ruta del modelo no debe incluir <code>\</code> al principio, es decir, evite <code>--model='\App\Models\MyModel'</code> y utilice <code>--model='App\Models\MyModel'</code></p>
</blockquote>
<h3>Crear Políticas</h3>
<pre><code class="language-bash">php artisan belich:policy NamePolicy --model='App\Models\MyModel'</code></pre>
<blockquote>
<p>El nombre (Name), debe de ir en singular, empezar en mayúsculas y contener la palabra: <code>Policy</code> justo después.</p>
</blockquote>
<p>El modelo <code>--model</code>, es opcional. Si lo deja en blanco, se utilizará el nombre de la <em>Política</em>, en la carpeta por defecto de laravel, quedando así en la política que ha creado:</p>
<pre><code class="language-php">use App\Name;</code></pre>
<p>Si desea específicar una ruta personalizada para el modelo (como se ha mostrado en el primer ejemplo), no olvide añadir las comillas simples, y al igual que pasaba el generar un recurso, evite incluir <code>\</code> al principio de la ruta del modelo.</p>
<blockquote>
<p>Puede seguir usando directamente Laravel para crear su política. Simplemente, tendrá que adaptarla a los requerimientos de <strong>Belich</strong>.</p>
</blockquote>
<h3>Crear una métrica/gráfica</h3>
<pre><code class="language-bash">php artisan belich:metric MetricName</code></pre>
<p>Y la métrica será creada en:</p>
<pre><code class="language-php">\App\Belich\Metrics;</code></pre>
<h3>Crear un componente o campo de formulario personalizado</h3>
<pre><code class="language-bash">php artisan belich:component CustomField</code></pre>
<p>Nos creará el campo personalizado, en la ruta:</p>
<pre><code class="language-php">\App\Belich\Components\CustomField;</code></pre>
<p>Para más información, visite: <a href="fields/custom">Componentes personalizados</a></p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>