<?php $__env->startSection('content'); ?><h1>Variables disponibles</h1>
<p>A continuación se detallan todos las variables de configuración disponibles para un recurso.</p>
<h3>accessToResource</h3>
<p>Esta variable, nos va a permitir deshabilitar el acceso a un recurso, y evitar por tanto, que esté disponible para navegación.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var bool */
public static $accessToResource = false;</code></pre>
<p>Esta variable está activada (con el valor <em>true</em>) por defecto, por lo que no es necesario añadirla.</p>
<h3>actions</h3>
<p><strong>Belich</strong> dispone de una serie de archivos <code>blade</code>, que están ubicados en la carpeta: <code>\resources\views\actions\</code>. En estos archivos se encuentran los botones de acción, que aparecerán en la vista <code>index</code> de los recursos:</p>
<pre><code class="language-php"><?php echo e('@'); ?>can('view', $model)
    &lt;a href="{{ Belich::actionRoute('show', $model) }}" class="action"&gt;@actionIcon('eye')&lt;/a&gt;
<?php echo e('@'); ?>endcan

<?php echo e('@'); ?>can('update', $model)
    &lt;a href="{{ Belich::actionRoute('edit', $model) }}" class="action"&gt;@actionIcon('edit')&lt;/a&gt;
<?php echo e('@'); ?>endcan

<?php echo e('@'); ?>can('delete', $model)
    &lt;a href="{{ Belich::actionRoute('destroy', $model) }}" class="action"&gt;@actionIcon('trash')&lt;/a&gt;
<?php echo e('@'); ?>endcan</code></pre>
<p>Por defecto, <strong>Belich</strong> accede al archivo <code>default.blade.php</code>, pero podemos crear (en dicha carpeta), nuestro propio archivo personalizado para ser utilizado en nuestro recurso, de forma, que podemos crear diferentes archivos para cada recurso.</p>
<p>Ahora, solo tenemos que indicarle a <strong>Belich</strong> que archivo utilizar en cada recurso, por ejemplo, si creamos un nuevo archivo (en la carpeta), llamado <code>newAction.blade.php</code>:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $actions = 'newAction';</code></pre>
<blockquote>
<p>Solo utilizar , si deseamos cambiar el archivo por defecto.</p>
</blockquote>
<h3>Controller actions</h3>
<p>A veces, necesitamos que un formulario envie la información a un controlador personalizado, en vez de usar el controlador <strong>CRUD</strong> por defecto de <strong>Belich</strong>. Para ello, tendremos que indicar la ubicación del controlador, de la siguiente forma:</p>
<pre><code class="language-php">/**
 * <?php echo e('@'); ?>var string
 */
public static $controllerAction = '\App\Http\Controllers\TestController';</code></pre>
<p><strong>Belich</strong>, automáticamente, añadirá a las vistas: <code>create</code> y <code>edit</code>, el método sobre el que actuar, por ejemplo, si nos encontramos en la vista <code>create</code>, automáticamente, inyectará a nuestro formulario, lo siguiente:</p>
<pre><code class="language-html">&lt;form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-create" id="form-responsecontrollers-create" action="{{ action('\App\Http\Controllers\TestController@create') }}"&gt;</code></pre>
<p>Y en el caso de la vista <code>edit</code>:</p>
<pre><code class="language-html">&lt;form method="POST" enctype="multipart/form-data" name="form-responsecontrollers-edit" id="form-responsecontrollers-edit" action="{{ action('\App\Http\Controllers\TestController@update') }}"&gt;</code></pre>
<p>En resumen, una forma sencilla de utilizar nuestro propio Controlador, para resolver el formulario.</p>
<h3>displayInNavigation</h3>
<p>Sirve para indicar si queremos que el recurso aparezca en los menus: tanto el superior como el lateral.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var bool */
public static $displayInNavigation = true;</code></pre>
<p>Esta variable está activada (con el valor <em>true</em>) por defecto, por lo que no es necesario añadirla.</p>
<h3>downloable</h3>
<p>Sirve para indicar si el recurso puede ser exportado a los diferentes formatos disponibles.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var bool */
public static $downloable = true;</code></pre>
<p>Esta variable está activada (con el valor <em>true</em>) por defecto, por lo que no es necesario añadirla.</p>
<h3>group</h3>
<p>Sirve para indicar que nuestro recurso, debe agruparse en un grupo determinado, creando un menu y su respectivo submenu en la navegación.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $group = 'My Group Name';</code></pre>
<p>Si lo dejamos en blanco, se considerará el recurso como raiz, y no se le asignarán subniveles, quedando como a continuación (Resource 3):</p>
<pre><code class="language-php">\Group1
    \Resource 1 
    \Resource 2
\Resource 3</code></pre>
<h3> icon</h3>
<p>Podemos asociar nuestro recurso con un icono de <a href="https://origin.fontawesome.com">Font-Awesome</a>. Para ello, debemos hacer lo siguiente:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $icon = 'user-friends';</code></pre>
<p>Simplemente debemos indicar el nombre que usa <code>fontawesome</code> para el icono.</p>
<blockquote>
<p>Este valor esta desactivado por defecto, por lo que debemos indicarle el nombre del icono si queremos que se muestre.</p>
</blockquote>
<h3>Nombre del recurso</h3>
<p>Para identificar el recurso, utilizamos etiquetas. Estas etiquetas son utilizadas por <strong>Belich</strong>, para referirse a el recurso en: menus, breadcrumbs, etc.</p>
<p>Existen dos tipos de etiquetas para identificar el recurso, la singular y la plural: <code>$label</code> y <code>$pluralLabel</code>.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $label = 'User';

/** <?php echo e('@'); ?>var string */
public static $pluralLabel = 'Users';</code></pre>
<blockquote>
<p>Si las dejamos en blanco, el sistema identificará el recurso con el nombre del archivo, y su versión en plural.</p>
</blockquote>
<h3>model</h3>
<p>Debemos indicarle a <strong>Belich</strong> qué modelo utilizar y donde está ubicado:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string [Model path] */
public static $model = '\App\User';</code></pre>
<blockquote>
<p>Este campo es obligatorio</p>
</blockquote>
<h3>redirectTo</h3>
<p>Después de realizar una acción, por ejemplo, crear un recurso. Podemos indicarle a <strong>Belich</strong> hacia donde queremos que redireccione.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $redirectTo = 'index';</code></pre>
<p>Hay que indicarle la acción que queremos que resuelva. Las acciones disponibles son:</p>
<ul>
<li><strong>index</strong></li>
<li><strong>show</strong></li>
<li><strong>create</strong> </li>
<li><strong>update</strong></li>
</ul>
<blockquote>
<p>Por defecto, <strong>Belich</strong> direccionará al index.</p>
</blockquote>
<h3>relationships</h3>
<p>Para evitar problemas de N+1 en las consultas a la base de datos, y utilizar <code>eager loading</code>, debemos indicarle a <strong>Belich</strong> que relaciones debe añadir a la consulta a la base de datos que realizará el modelo.</p>
<blockquote>
<p>Solo cuando usemos campos tipo <code>Text</code> y queramos obtener los datos de un campo relacional (por ejemplo, si estamos mostrando los datos del usuario, y queremos mostrar un dato que está en su perfil). En caso contrario, diponemos de campos relacionales directos, como son: <code>HasOne</code>, <code>HasMany</code>, <code>BelongsTo</code>,...</p>
</blockquote>
<pre><code class="language-php">/** <?php echo e('@'); ?>var array */
public static $relationships = ['billing'];</code></pre>
<h3>tableTextAlign</h3>
<p>Permite alinear la tabla del <code>index</code>, según nuestras necesidades. Por defecto, el valor es la alineación a la izquierda. Permite los valores: <code>left</code>, <code>center</code>, <code>right</code> y <code>justify</code>.</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var string */
public static $tableTextAlign = 'center';</code></pre>
<h3>softDeletes</h3>
<p>Debemos indicarle a <strong>Belich</strong>, si nuestro modelo incluye <code>softdeletes</code>. Si es así, demos indicárselo de la siguiente forma:</p>
<pre><code class="language-php">/** <?php echo e('@'); ?>var array */
public static $softDeletes = true;</code></pre>
<blockquote>
<p>Por defecto está desactivado.</p>
</blockquote><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>