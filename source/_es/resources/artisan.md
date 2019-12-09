---
title: Recursos
description: Gestión de recursos con Belich
extends: _layouts.documentation
section: content
locate: es
---

# Recursos

**Belich** dispone de un comando de `artisan`, que le permitirá crear recursos de forma sencilla y rápida:

```php
php artisan belich:resource ResourceName
```

Puede encontrar más información en: [Comandos de consola](commands), donde se especifican todas las opciones disponibles.

Recuerde usar las *convenciones de **Laravel*** o **Belich** no funcionará correctamente: 

- El nombre del recurso en ingles y *UpperCamelCase*. Ejemplo: User (`App\Belich\Resources\User.php`).
- El nombre del modelo en ingles y *UpperCamelCase*. Ejemplo: User (`App\User.php`).

Es decir, el nombre del recurso y del modelo deberían coincidir (aunque no es imprescindible, pero por lo general, debe de ser la norma).
