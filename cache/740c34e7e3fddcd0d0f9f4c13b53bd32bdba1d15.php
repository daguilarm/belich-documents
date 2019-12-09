<?php $__env->startSection('content'); ?><h1>Instalar Belich</h1>
<h3>Instalar mediante composer</h3>
<pre><code class="language-php">composer require daguilarm/belich</code></pre>
<h3>Crear migraciones</h3>
<pre><code class="language-php">php artisan migrate</code></pre>
<h3>Crear los seeders</h3>
<p>Por defecto, <strong>Belich</strong> supone que cada usuario debe de tener un perfil con información adicional (como el avatar), aunque todo esto puede suprimirse si se desea (más información en el apartado <em>Configuración de la aplicación</em> que podrá encontrar aqui: <a href="config">Configuración</a>).</p>
<p>Si desea crear los seeders para las bases de datos: <code>users</code> y <code>profiles</code>, deberá ir a <code>.\database\seeds</code> y crear el archivo:</p>
<ul>
<li><code>UsersTableSeeder.php</code></li>
</ul>
<p>Una vez creado, añádalo al archivo <code>DatabaseSeeder.php</code>. A modo de ejemplo, este podría ser su archivo:</p>
<pre><code class="language-php">\database\seeds\UsersTableSeeder.php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * <?php echo e('@'); ?>return void
     */
    public function run()
    {
        //Create 100 users
        $users = factory(\App\User::class, 100)-&gt;create();
    }
}</code></pre>
<p>Ahora, hay que crear el archivo <code>factory</code>, para ello, vamos a <code>\database\factories</code> y creamos los archivos <code>ProfileFactory.php</code> y <code>UserFactory.php</code>. A modo de ejemplo, sus archivos podría ser así:</p>
<pre><code class="language-php">\database\seeds\UserFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory-&gt;define(App\User::class, function (Faker $faker) {
    return [
        'name'              =&gt; $faker-&gt;name,
        'email'             =&gt; $faker-&gt;unique()-&gt;safeEmail,
        'email_verified_at' =&gt; now(),
        'password'          =&gt; '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    =&gt; Str::random(10),
        'created_at'        =&gt; $faker-&gt;dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
    ];
});

$factory-&gt;afterCreating(App\User::class, function ($user, $faker) {
    factory(\App\Profile::class)-&gt;create([
        'user_id' =&gt; $user-&gt;id
    ]);
});</code></pre>
<pre><code class="language-php">\database\seeds\ProfileFactory.php

use Faker\Generator as Faker;

$factory-&gt;define(\App\Profile::class, function (Faker $faker) {
    return [
        'profile_nick'             =&gt; $faker-&gt;word(),
        'profile_avatar'           =&gt; $faker-&gt;imageUrl(200, 200, 'people') ,
        'profile_age'              =&gt; rand(18, 75),
        'profile_locale'           =&gt; $faker-&gt;locale,
    ];
});</code></pre>
<h3>Actualizar las rutas.</h3>
<p>Por defecto, el acceso a la autentificación de usuario se encuentra en <code>domain.com/dashboard/login</code></p>
<p>Podemos cambiarlo según nuestras necesidades, definiendo la ruta del directorio, en nuestro archivo <code>config\belich.php</code>, modificando la variable:</p>
<pre><code class="language-php">//This is the URI path where application will be accessible from
'path' =&gt; '/dashboard',</code></pre>
<p>Y posteriormente, podemos definir nuestra ruta personalizada, desde el archivo <code>routes\web.php</code>, utilizando el siguiente código (para que por defecto nos redirija a la página de autentificación):</p>
<pre><code class="language-php">Route::get('/', function () {
    return redirect()-&gt;route('login');
});</code></pre>
<blockquote>
<p>Por defecto, <strong>Belich</strong> asigna la ruta <code>login</code> para su acceso identificado, esto puede llegar a generar un conflicto, por lo que puede modificarlo (reescribiéndo el campo name de la ruta) desde el archivo <code>\app\Belich\Routes.php</code></p>
</blockquote>
<p>A modo de ejemplo:</p>
<pre><code class="language-php">Route::get(Belich::path() . '/login', 'Daguilarm\Belich\App\Http\Controllers\Auth\LoginController@showLoginForm')-&gt;name('myproject.login');</code></pre>
<h3>Publicar componentes</h3>
<pre><code class="language-php">php artisan vendor:publish --provider="Daguilarm\Belich\ServiceProvider"</code></pre>
<h3>Limpiar vistas y cache</h3>
<pre><code class="language-php">php artisan view:clear &amp;&amp; php artisan cache:clear</code></pre>
<h3>Actualizar composer</h3>
<pre><code class="language-php">composer dump-autoload</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>