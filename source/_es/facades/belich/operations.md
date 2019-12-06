# Belich Facade: Operaciones

#### count()

Nos permite obtener el número total de resultados de un objeto o array. El formato utilizado sería:

```php
Belich::count($value, int $initialValue = 0)
```

La variable `$value`, sería el array u objeto a contar, permitiendo un segundo parámetro, que nos permite inicial la cuenta en el valor que necesitemos. Por defecto, será 0. Por ejemplo:

```php
Belich::count(\App\Models\User::all())
Belich::count([1, 2, 3, 4, 5])
```
