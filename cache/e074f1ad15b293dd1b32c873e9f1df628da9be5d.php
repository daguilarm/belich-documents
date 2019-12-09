<?php $__env->startSection('content'); ?><h1>Acerca de Belich</h1>
<p><strong>Belich</strong> es un panel de administración basado en <a href="https://laravel.com" class="link-out">Laravel</a>, y que ha sido influenciado por la documentación de <a href="https://nova.laravel.com" class="link-out">Nova</a>, <a href="https://laravelcollective.com/" class="link-out">Laravel Collective</a> y <a href="https://github.com/LaravelDaily/quickadmin" class="link-out">Quickadmin</a>.</p>
<p>El concepto de <strong>Belich</strong>, es totalmente diferente, ya que la idea principal es la de basar el desarrollo del proyecto en el <em>Back-end</em>, y por tanto, eliminando cualquier <strong>javascript framework</strong>, como <a href="https://vuejs.org/" class="link-out">VueJS</a>, <a href="https://reactjs.org" class="link-out">React</a> o incluso <a href="https://jquery.com/" class="link-out">Jquery</a>, de la ecuación. </p>
<p>La idea es, poner todo el peso en la parte de <code>php</code>, pero permitiendo la flexibilidad necesaria para que cada usuario, pueda integrar cualquier tecnología o <strong>framework</strong> que desee.</p>
<p><strong>¿Y esto por qué?</strong> Básicamente, para ganar en simplicidad. Con <strong>Belich</strong> es muy realmente sencillo personalizar cualquier campo o sección, y todo ello, sin tener que desarrollar complejos componentes con <strong>frameworks javascript</strong>. </p>
<p>Y por supuesto, todo el código construido desde cero, e intengrando las últimas tecnologías disponibles.</p>
<p>Requerimientos:</p>
<ul>
<li>php 7.4 &gt;</li>
<li>Laravel 6.x</li>
</ul><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>