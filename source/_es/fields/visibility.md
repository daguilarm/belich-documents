---
title: Visibilidad de campos
description: Gestión de campos de formulario en lo referente a visibilidad
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Visibilidad de campos 

Belich dispone de una serie de métodos que nos permitirán mostrar u ocultar los campos según nuestras necesidades. Estos métodos son genéricos, y se aplican a todos los tipos de campo.

>**Belich**, a veces, aplica a cada campo comportamientos de visualización predeterminados. Por ejemplo, a los campos `TextArea::make()` les asigna solo visualización en `index`, `edit` y `create`, y esconde el campo `show`. Por lo tanto, si queremos verlo, deberemos activalo con el método correspondiente (por ejemplo `visibleOn('show')` o el método `showOnDetail()`). En otras ocasiones, como por ejemplo con el campo `Id::make()`, la asignación de visualización no puede cambiarse, y en este caso, solo puede verse en las vistas: `index` y `show`, independientemente de que añadamos `visibleOn('create')`, seguirá sin verse en la vista `create`.

### Métodos de visibilidad de campos

El sistema soporta los siguientes métodos:

- `hideFromIndex()`
- `hideFromShow()` alias `hideFromDetail()`
- `hideWhenCreating()`
- `hideWhenEditing()` alias `hideWhenUpdating()`
- `onlyOnIndex()`
- `onlyOnShow()` alias `onlyOnDetail()`
- `onlyOnForms()`
- `exceptOnForms()`
- `visibleOn()`
- `hideFrom()`
- `showOnIndex()`
- `showOnShow()` alias `showOnDetail()`
- `showOnCreating()`
- `showOnEditing()` alias `showOnUpdating()`

> Se pueden utilizar indistintamente los alias, ya que el resultado es el mismo.

Veamos un ejemplo de uso:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('Usuarios', 'name')
            ->hideFromIndex(),
        Text::make('Facturas', 'bill')
            ->visibleOn('index', 'edit', 'show'),
    ]
}
```

El primer campo de texto, se verá solo en la vista `index`, mientras que el segundo, se mostrará en las vistas: `index`, `edit` y `show`, ocultándose en el resto.

>Recuerda que las cuatro vista soportadas son: `index`, `edit`, `show` y `create`.

Los métodos `visibleOn()` y `hideFrom()`, nos permiten mostrar u ocultar campos de forma personalizada, el resto de métodos, son alias de estos dos.
