# Comandos de consola

### Instalar Belich 

Instala el package Belich en su copia de Laravel.

```php
php artisan belich:install
```

### Crear recurso

```php
php artisan belich:resource Resource
```

?>El nombre del recurso (Resource), debe de ir en singular.

El recurso, será creado en:

```php
\App\Belich\Resources\Resource;
```

Se dispone de varias opciones de vonfiguración, por ejemplo, se puede especificar el la ruta del modelo, y que por tanto, sea incluida en el código:

```php
php artisan belich:resource Resource  --model='App\Models\MyModel'
```

Belich, también permite crear el modelo, a la misma vez que el recurso:

```php
php artisan belich:resource Resource  --model='App\Models\MyModel' --create
```

?>Recuerde que la ruta del modelo no debe incluir `\` al principio, es decir, evite `--model='\App\Models\MyModel'` y utilice `--model='App\Models\MyModel'`

### Crear Políticas

```php
php artisan belich:policy NamePolicy --model='App\Models\MyModel'
```

?>El nombre (Name), debe de ir en singular, empezar en mayúsculas y contener la palabra: `Policy` justo después.

El modelo `--model`, es opcional. Si lo deja en blanco, se utilizará el nombre de la *Política*, en la carpeta por defecto de laravel, quedando así en la política que ha creado:

```php
use App\Name;
```

Si desea específicar una ruta personalizada para el modelo (como se ha mostrado en el primer ejemplo), no olvide añadir las comillas simples, y al igual que pasaba el generar un recurso, evite incluir `\` al principio de la ruta del modelo.

?>Puede seguir usando directmente Laravel para crear su política. Simplemente, tendrá que adaptarla a los requerimientos de Belich.

### Crear una métrica/gráfica

```php
php artisan belich:metric MetricName
```

Y la métrica será creada en:

```php
\App\Belich\Metrics;
```
