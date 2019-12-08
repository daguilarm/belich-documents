---
title: Fachadas de belich - Modelos
description: Gestionando fachadas (facades) de belich para obtener información de Modelos
extends: _layouts.documentation
section: content
locate: es
folder: facades/belich
---

# Fachadas (facades) de belich: Modelos

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
