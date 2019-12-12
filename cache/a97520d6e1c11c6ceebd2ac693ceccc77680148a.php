<?php $__env->startSection('content'); ?><h1>Métodos obligatorios</h1>
<p>Disponemos de una serie de métodos que deben incluirse de forma obligatoria en cada recurso:</p>
<h3>fields()</h3>
<p>Este método, nos permitirá generar los diferentes campos de formulario de cada recurso:</p>
<pre><code class="language-php">/**
 * Get the fields displayed by the resource.
 *
 * <?php echo e('@'); ?>param  \Illuminate\Http\Request  $request
 * <?php echo e('@'); ?>return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        ID::make('Id'),
        Text::make('Name', 'name')
            -&gt;sortable()
            -&gt;rules('required'),
        Text::make('Email', 'email')
            -&gt;rules(
                'required', 
                'email', 
                'unique:users,email'
            )
            -&gt;sortable(),
        Password::make('Password', 'password')
            -&gt;creationRules(
                'required', 
                'required_with:password_confirmation', 
                'confirmed', 
                'min:6'
            )
            -&gt;updateRules(
                'nullable', 
                'required_with:password_confirmation', 'same:password_confirmation', 
                'min:6'
            )
            -&gt;onlyOnForms(),
        PasswordConfirmation::make('Password confirmation'),
    ];
}</code></pre>
<p>Puede encontrar más información en: <a href="../fields/intro">Campos de formulario</a>, donde se especifican todas las opciones disponibles.</p>
<h3>cards()</h3>
<p>Sirve par indicarle al recurso que componentes (cards) debe de incluir:</p>
<pre><code class="language-php">/**
 * Set the custom cards
 *
 * <?php echo e('@'); ?>param  \Illuminate\Http\Request  $request
 * <?php echo e('@'); ?>return Illuminate\Support\Collection
 */
public static function cards(Request $request) {
    new \App\Belich\Cards\UserCard($request),
}</code></pre>
<p>Puede encontrar más información en: <a href="../cards/card">Cards</a>, donde se especifican todas las opciones disponibles.</p>
<h3>metrics()</h3>
<p>Sirve par indicarle al recurso que métricas debe de incluir:</p>
<pre><code class="language-php">/**
 * Set the custom metrics cards
 *
 * <?php echo e('@'); ?>param  \Illuminate\Http\Request  $request
 * <?php echo e('@'); ?>return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        new \App\Belich\Metrics\UsersPerMonth($request),
        new \App\Belich\Metrics\UsersPerDay($request),
        new \App\Belich\Metrics\UsersPerHour($request),
    ];
}</code></pre>
<p>Puede encontrar más información en: <a href="../metrics/metrics">Gráficas y estadísticas</a>, donde se especifican todas las opciones disponibles.</p>
<h3 id="width">Asignar ancho a Gráficas y Cards desde el recurso</h3>
<p>También se puede asignar el ancho de la métrica (o card) directamente desde aquí, sin necesidad de configurar el archivo de la métrica (o card). A modo de ejemplo (válido para ambos):</p>
<pre><code class="language-php">/**
 * Set the custom metrics cards
 *
 * <?php echo e('@'); ?>param  \Illuminate\Http\Request  $request
 * <?php echo e('@'); ?>return Illuminate\Support\Collection
 */
public static function metrics(Request $request) {
    return [
        (new \App\Belich\Metrics\UsersPerMonth($request))-&gt;width('w-1/3'),
        (new \App\Belich\Metrics\UsersPerDay($request))-&gt;width('w-2/3'),
    ];
}</code></pre><?php $__env->stopSection(); ?>
<?php echo $__env->make('_layouts.documentation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>