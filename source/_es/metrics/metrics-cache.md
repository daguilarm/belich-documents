# Caché para gráficas

Para asignar el cache, se ha optado por un helper, principalmente pensando en los cambios en la caché que presentará Laravel 5.8.

La utilización del helper, nos va a permitir guardar todos los datos como modelo `Carbon\Carbon`, y poder utilizar el formato que más nos guste: segundos, minutos, horas,...

Todos los métodos, necesitan dos parámetros: 

- La cantidad de tiempo 
- clave única. 

?>La mejor opción parece ser pasar la `$this->uriKey()` de la gráfica.

```php
Connection::make(User::class)
    ->cacheInMinutes(10, $this->urikey())
```

Los métodos disponibles son:

- `cacheForEver()`
- `cacheInMinutes(int $minutes, string $key)`
- `cacheInHours(int $hours, string $key)`
- `cacheInDays(int $days, string $key)`
