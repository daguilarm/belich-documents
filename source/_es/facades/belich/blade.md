---
title: Fachadas de belich - blade
description: Gestionando fachadas de belich para renderizar html a traves de blade
extends: _layouts.documentation
section: content
locate: es
folder: facades/belich
---

# Facades de belich - blade

En esta sección, encontraremos métodos para renderizar código HTML.

## Métodos para Blade (generando HTML)

A veces necesitamos generar código HTML en Blade, y no queremos añadir código PHP a nuestro template. Para ello, se han desarrollado algunos helpers para ser utilizados de forma directa.

Normalmente, estos métodos son utilizados por el sistema, pero pueden ser útiles para desarrollar módulos propios, nuevos campos de formulario o packages, en cualquier caso, sirvan o no, aquí están disponibles para su uso.

Los métodos soportados son:

#### value()

Modifica el valor de un campo al mostrarlo en la vista. Se utiliza, cuando este campo tiene una relación (relationship), o utiliza los métodos `displayUsing` o `resolveUsing`. 

Utiliza la siguiente sintaxis:

```php
Belich::value($field, $model)
```

Es utilizado por el sistema en las vistas `index` y `show`.

