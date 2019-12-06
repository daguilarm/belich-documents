# Belich Facade: Modelos

#### getModel()

Nos devuelve una instancia del modelo, utilizado por el recurso actual.

```php
Belich::getModel()
```

#### getModelPath()

Sirve para conseguir la ruta completa al modelo, que está definida en el recurso:

```php
Belich::getModelPath()

//Will return 
\App\Users::class
```


#### getModelKeyName()

Nos devuelve la cláve primaria del modelo, por norma general será `id`.
