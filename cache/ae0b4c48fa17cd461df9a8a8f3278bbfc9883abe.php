<?php $__env->startSection('content'); ?><h1>Archivo de configuración</h1>
<p>El archivo de configuración, se genera en la carpeta de configuración de Laravel: <code>\config\belich.php</code>.</p>
<p>En este archivo, vamos a poder configurar <strong>Belich</strong> de forma sencillar y rápida. Dispone de diferentes apartados, que vamos a ir viendo uno a uno.</p>
<h3>Configuración de la aplicación</h3>
<ul>
<li><strong>name</strong>: El nombre de la aplicación. Por defecto:<code>Belich Dashboard</code>.</li>
<li><strong>path</strong>: La ruta desde la que se accederá a Belich. Por defecto: <code>dashboard/</code>.</li>
<li><strong>url</strong>: Url donde está ubicado <strong>Belich</strong>. Por defecto:<code>/</code>.</li>
<li><strong>profile</strong>: Campo boleano, que nos permite activar o desactivar el recurso <code>\App\Belich\Resources\Profile.php</code>. </li>
</ul>
<p>Al hacer esto, eliminamos las referencias en el código a este archivo, pero en la barra de navegación, se seguirá visualizando. Para eliminarlo, tenemos dos opciones:</p>
<ol>
<li>Eliminar el archivo <code>\App\Belich\Resources\Profile.php</code>. No recomendada, siempre es mejor desactivar a eliminar...</li>
<li>Desactivar la visualización del recurso en la barra de navegación. Para ello, en el archivo <code>\App\Belich\Resources\Profile.php</code>, buscaremos la propiedad <code>public static $displayInNavigation</code> y la desactivaremos:</li>
</ol>
<pre><code class="language-php">/** <?php echo e('@'); ?>var bool */
public static $displayInNavigation = false;</code></pre>
<h3>Navegación</h3>
<p><strong>Belich</strong>, ofrece dos formas de navegación, mediante barra superior o lateral.</p>
<ul>
<li><strong>navbar</strong>: admite dos opciones <code>top</code> o <code>sidebar</code>.</li>
</ul>
<pre><code class="language-php">'navbar' =&gt; 'top',</code></pre>
<p>La opción por defecto, es <code>top</code>. En ella se prescinde de la barra lateral, y los recursos son mostrados en la barra superior. Es una opción indicada cuando vamos a mostrar grandes tablas con muchos datos.</p>
<p>La opción <code>sidebar</code>, nos ofrece los recursos en la barra lateral, y deja la bara superior para mostrar la configuración de usuario y el fin de sesión.</p>
<p>También podemos definir un icono por defecto en nuestra barra de navegación, utilizando el campo: </p>
<pre><code class="language-php">'defaultIcon' =&gt; 'caret-right',</code></pre>
<blockquote>
<p><strong>Belich</strong> utiliza <a href="https://origin.fontawesome.com/icons?d=gallery" class="link-out">Font-awesome</a>, por lo que solo tendrás que añadir el nombre del icono, tal y como se muestra en la página.</p>
</blockquote>
<h3>Middleware</h3>
<p>Podemos configurar el middleware según nuestras necesidades. Por defecto, se utilizan:</p>
<ul>
<li><strong>https</strong>: middleware para garantizar que siempre se utiliza una url segura. Esta opción, es optativa y puede eliminarse sin mayor problema.</li>
<li><strong>web</strong>: carga una buena parte del middleware que ofrece por defecto Laravel. Eliminar solo si se sabe que se está haciendo.</li>
<li><strong>auth</strong>: autentificación por defecto de Laravel. Eliminar solo si se sabe que se está haciendo.</li>
</ul>
<p>Para añadir middleware personalizado, solo tenemos que añadirlo al array:</p>
<pre><code class="language-php">'middleware' =&gt; [
    'https',
    'web',
    'auth',
    'customMiddelware1',
    'customMiddelware2',
    ...
],</code></pre>
<h3>Exportar archivo</h3>
<p>Selección del driver de exportación de bases de datos a archivos. Desde aquí, podrá configurar que driver utilizará Belich para generar archivos <code>XLS</code>, <code>XLSX</code> o <code>CSV</code>, a partir de la base de datos.</p>
<p>Seleccione el driver que prefiera, a partir de la lista suministrada:</p>
<pre><code class="language-php">'export' =&gt; [
    'driver' =&gt; 'fast-excel',
],</code></pre>
<h3>Parámetros permitidos en la URL</h3>
<p>Belich, limita los parámetros que pueden ser enviados por la URL, y por tanto, ser utilizados por la aplicación. Si añadimos parámetros a la URL, Belich automáticamente los eliminará, por lo tanto, si queremos añadir parámetros nuevos, tendremos que hacerlo a traves del campo <code>allowedUrlParameters</code>.</p>
<p>Por defecto, tiene este aspecto:</p>
<pre><code class="language-php">'allowedUrlParameters' =&gt; []</code></pre>
<p>Es decir, sólo utiliza los parámetros por defecto de Belich. Si queremos añadir nuestros propios parámetros, tendremos que hacerlo de la siguiente forma:</p>
<pre><code class="language-php">'allowedUrlParameters' =&gt; ['param1', 'param2',...]</code></pre>
<h3>Minimizar el HTML de la aplicación</h3>
<p>Belich utiliza un <code>middleware</code> para comprimir el código HTML de la aplicación, antes de ser cacheado por Laravel. Este proceso, aporta una disminución del tamaño del web. Esta disminución de tamaño, suelo estar en torno al 25%, aunque es variable, y dependerá de las características de cada proyecto.</p>
<p>Por defecto, esta opción se encuentra activada, pero puede desactivarse de forma sencilla:</p>
<pre><code class="language-php">'minifyHtml' =&gt; [
    'enable' =&gt; false,
]</code></pre>
<p>Puede suceder que este <code>middleware</code> afecte a otras partes del proyecto, propiciando que no funcione correctamente. </p>
<p>Por ejemplo, para evitar problemas con la exportación de archivos, se ha deshabilitado en todas las rutas que Belich utiliza para exportar archivos. A partir de esta situación (problemas con el <code>middleware</code> y las descargas), se decidió permitir la configuración de rutas que estuvieran excluidas de este <code>middleware</code>.</p>
<p>Se puede hacer de dos formas:</p>
<ol>
<li>Indicando que acciones quremos excluir del <code>middleware</code>:</li>
</ol>
<pre><code class="language-php">'minifyHtml' =&gt; [
    'enable'    =&gt; true,
    'except'  =&gt; [
        'actions' =&gt; ['index', 'show'],
        'paths'   =&gt; [],
    ],
],</code></pre>
<ol start="2">
<li>Indicando las urls que queremos excluir:</li>
</ol>
<pre><code class="language-php">'minifyHtml' =&gt; [
    'enable'    =&gt; true,
    'except'  =&gt; [
        'actions' =&gt; [],
        'paths'   =&gt; ['dashboard/users'],
    ],
],</code></pre>
<p>?&gt;No es necesario preocuparse por si nuestra ruta empieza o termina con <code>/</code>. Belich las elimina de forma automática para hacer la comprobación.</p>
<h3>Eliminar Componentes (Gráficas y Cards) según el tamaño de pantalla</h3>
<p>Podemos indicarle a <strong>Belich</strong>, que no queremos mostrar <code>cards</code> o <code>metrics</code> en dispositivos grandes, para ello, haremos lo siguiente:</p>
<pre><code class="language-php">'hideComponentsForScreens' =&gt; ['lg'],</code></pre>
<p>Los valores soportados son:</p>
<ul>
<li><strong>sm</strong>: a partir de 576px.</li>
<li><strong>md</strong>: a partir de 768px.</li>
<li><strong>lg</strong>: a partir de 992px.</li>
<li><strong>xl</strong>: a partir de 1200px.</li>
</ul>
<h3>Formato de fecha</h3>
<p>Podemos definir el formato en el que queremos mostrar las fecha en la aplicación. </p>
<p>Este valor, se utilizará en los campos de formulario <code>Date</code>. Estos campos devolverán el valor en las vistas: <code>index</code> y <code>show</code>, conforme a lo que definamos:</p>
<pre><code class="language-php">/*
|--------------------------------------------------------------------------
| Date format
|--------------------------------------------------------------------------
|
| Define the default date format. This format will be use in the Controller actions: index and show.
*/
'dateFormat' =&gt; 'd/m/Y',</code></pre>
<p>Nos devolverá (por ejemplo):</p>
<pre><code>30/12/2018</code></pre>
<h3>Paginación de resultados</h3>
<p>Podemos usar los dos tipos de paginación que tiene <strong>Laravel</strong> por defecto: </p>
<ul>
<li>Links (link)</li>
<li>Simple pagination (simple)</li>
</ul>
<p>Para ello, disponemos de la variable <code>pagination</code>:</p>
<pre><code class="language-php">/*
|--------------------------------------------------------------------------
| Pagination
|--------------------------------------------------------------------------
|
| Define the paginate style. Two styles available: link or simple
*/
'pagination' =&gt; 'link',</code></pre>
<h3>Utilizar live search (búsqueda en tiempo real) en el <code>index</code> de <strong>Belich</strong></h3>
<p>El campo <code>enable</code> nos permite activar la busqueda o eliminarla de las vistas de <strong>Belich</strong>.</p>
<p>El campo <code>minChars</code>, determina el número mínimo de caracteres necesarios para que se realice la búsqueda.</p>
<pre><code class="language-php">'liveSearch' =&gt; [
    'enable' =&gt; true,
    'minChars' =&gt; 2,
],</code></pre>
<h3>Configurar la reducción de caracteres de los campos textArea</h3>
<p>Este campo nos permite limitar el texto que se muestra en los campos de formulario: <code>textarea</code>, limitándolo al número de caracteres que configuremos.</p>
<pre><code class="language-php">'textAreaChars' =&gt; 25,</code></pre>
<h3>Cargando...</h3>
<p>Podemos definir el icono o imagen que se verá cuando estemos cargado páginas o partes de página mediante ajax. Podemos definirlo en:</p>
<pre><code class="language-php">/*
|--------------------------------------------------------------------------
| Loading status
|--------------------------------------------------------------------------
|
| Show the loading icon for ajax queries
*/
'loading' =&gt; '&lt;i class="fas fa-spinner fa-spin fa-10x text-blue-200"&gt;&lt;/i&gt;',</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>