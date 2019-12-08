---
title: Belich facades - Models
description: Managing Belich's facades to obtain information about Models
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich facades - Models

#### getModel()

It returns an instance of the model, used by the current resource.

```php
Belich::getModel()
```

#### getModelPath()

It serves to get the full path to the model, which is defined in the resource:

```php
Belich::getModelPath()

//Will return 
\App\Users::class
```

#### getModelKeyName()

This will return the primary key of the model, as a general rule it will be `id`.
