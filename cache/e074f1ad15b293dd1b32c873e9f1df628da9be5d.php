<?php $__env->startSection('content'); ?><h1>Acerca de Belich</h1>
<p><strong>Belich</strong> es un panel de administración basado en <a href="https://laravel.com" class="link-out">Laravel</a>. Mi principal influencia a la hora de desarrollarlo ha sido <a href="https://github.com/adamwathan/bootforms" class="link-out">bootforms</a> de <a href="https://adamwathan.me/" class="link-out">Adam Wathan</a>, que fue mi primera experiencia con un <em>package</em> que ofrecía una forma de crear formularios, que en aquel momento, me pareció espectacular... todo basado en métodos encadenados que al final definían un campo de formulario:</p>
<pre><code class="language-php">{!! 
    BootForm::open()-&gt;action( route('users.update', $user) )-&gt;put()
        BootForm::text('First Name', 'first_name') 
            -&gt;id('my first name')
    BootForm::bind($user)
    BootForm::close()
!!}</code></pre>
<p>Mi objetivo siempre fue hacer algo así, y no fue hasta que surgió <a href="https://nova.laravel.com" class="link-out">Nova</a>, que continuando con esta idea y llevándola más alla, consiguió un producto completo y funcional. </p>
<p>Entonces, empecé a trabajar con <strong>Nova</strong> y al principio todo fue genial, pero no tardaron en llegar los primeros problemas. Mi proyecto exigía de una flexibilidad y funcionabilidades que <strong>Nova</strong> no me podía dar. La situación era que me pasaba el día diseñando parches y <em>packages</em> para añadir las funcionalidades que necesitaba. Hay que matizar, que por aquel entonces, <strong>Nova</strong> estaba muy lejos de ser lo que es ahora, por aquel entonces tenía la impresión de que habían lanzado el producto sin terminar... hoy en día, es un producto mucho más completo y perfeccionado, aunque sigue siendo (para mi), un producto con una dependencia excesiva en <strong>javascript</strong>. </p>
<p>Al final, decidí empezar <strong>Belich</strong>, con la idea de solucionar estos problemas, y sobre todo, teniendo en mente la idea de mantener alejado los <em>frameworks</em> basados en <em>javascript</em>, como: <a href="https://vuejs.org/" class="link-out">VueJS</a>, <a href="https://reactjs.org" class="link-out">React</a> o incluso <a href="https://jquery.com/" class="link-out">Jquery</a>. </p>
<p>El objectivo, fue al final, el de dejar todo el protagonismo (o casi todo) a <a href="http://php.net" class="link-out">Php</a>. </p>
<p>Una vez empecé a desarrollar <strong>Belich</strong>, me surgío un problema importante: debía encontrar una forma de migrar mi viejo proyecto con <strong>Nova</strong> hacia <strong>Belich</strong>... el principal problema lo veía en los recursos, ya que tenía cerca de 70 recursos creados, y la migración de todo aquello iba a ser un caos. Opté por intentar mantener cierta homogenidad en la forma de procesar estos archivos, para que la transición fuera sencilla, y esto me llevó a mantener cierta coherencia entre la sintaxis de ambos proyectos.</p>
<p>Todo esto, manteniendo en mente la idea de cambiar todo el concepto de funcionamiento interno del código, cambiando de raiz la forma en que se renderizaban los recursos, haciéndose ahora directamente mediante <strong>Blade</strong> en vez de <strong>VueJS</strong> como lo hacía <strong>Nova</strong>. Durante este proceso, surgieron algunos problemas técnicos, pero gracias a <a href="https://github.com/code16/sharp" class="link-out">Sharp</a> y su forma de abordar estas situaciónes, encontré algunas ideas interesantes.</p>
<p>A modo de resumen, el concepto sobre el que se ha desarrollado <strong>Belich</strong>, ha sido el de poner todo el peso en la parte de <code>Php</code>, pero siempre permitiendo la flexibilidad, para que cada usuario pueda integrar cualquier tecnología o <strong>framework</strong> que desee.</p>
<p><strong>¿Y todo esto para qué?</strong> Básicamente, para ganar en simplicidad. Con <strong>Belich</strong> es muy realmente sencillo personalizar cualquier campo o sección, y todo ello, sin tener que desarrollar complejos componentes con <strong>javascript</strong>. </p>
<p>Y por supuesto, todo el código construido desde cero, e intengrando las últimas tecnologías disponibles.</p>
<p>Requerimientos:</p>
<ul>
<li>php 7.4 &gt;</li>
<li>Laravel 6.x</li>
</ul><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>