<?php $__env->startSection('content'); ?><h1>Recursos</h1>
<p><strong>Belich</strong> dispone de un comando de <code>artisan</code>, que le permitirá crear recursos de forma sencilla y rápida:</p>
<pre><code class="language-php">php artisan belich:resource ResourceName</code></pre>
<p>Puede encontrar más información en: <a href="commands">Comandos de consola</a>, donde se especifican todas las opciones disponibles.</p>
<p>Recuerde usar las <em>convenciones de <strong>Laravel</strong></em> o <strong>Belich</strong> no funcionará correctamente: </p>
<ul>
<li>El nombre del recurso en ingles y <em>UpperCamelCase</em>. Ejemplo: User (<code>App\Belich\Resources\User.php</code>).</li>
<li>El nombre del modelo en ingles y <em>UpperCamelCase</em>. Ejemplo: User (<code>App\User.php</code>).</li>
</ul>
<p>Es decir, el nombre del recurso y del modelo deberían coincidir (aunque no es imprescindible, pero por lo general, debe de ser la norma).</p><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>