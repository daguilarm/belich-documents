---
title: Campos de formularios 
description: Gestión de campos de formulario
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Campos de formularios 

Los formularios se gestionan desde la carpeta de recursos. la cual se encuentra en la ruta: `\App\Belich\Resources\`

En esta carpeta encontraremos todos los recursos de la aplicación. 

En el archivo del recurso, encontraremos el método: `fields()`. Es aquí donde configuraremos nuestro formulario:

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request) {
    return [
        Text::make('User name', 'name')
            ->id('user_id')
            ->defaultValue('Usuario 1')
            ->help('this is a help text')
            ->rules('required'),
        Text::make('Invoice Nº', 'user_name', 'billing')
            ->disabled()
            ->sortable()
            ->hideFromIndex()
            ->help('this is a help text')
            ->rules('required'),
        Select::make('Professions', 'professions')
            ->options(\App\Models\Profession::all())
            ->defaultValue(1),
    ]
}
```

Este sería un ejemplo de cómo funcionaría nuestra función de campos de formulario. 

Este formulario, se encarga de mostrar las cuatro vistas que ofrece cada recurso: `index`, `create`, `edit` y `show`. 

>Automáticamente se renderizará cada vista a partir de la información del método `fields()`.

Todos los tipos de campos deben de incluir un método llamado `make()`. Este método, soporta dos variables: `$label` y `$attribute`, es decir, el método quedaría de la siguiente forma `make($label, $attribute)`.

Esta regla que se aplica para el método `make()`, se cumple (por lo general) para todos los campos no relacionales: `Text`, `Select`, `Hidden`, `Textarea`.., sufriendo algunos cambios en los campos relationales: `BelongTo`,...

El campo `$label`, generará la etiqueta `<label>` del formulario, mientras el campo `$attribute`, representa la columna de la base de datos vinculado con el campo de formulario.

>El método `fields()` recibe la variable `$request`. Esto es así, para los casos en que se necesite utilizar algún dato para realizar una operación. Por ejemplo: `$request->user()->isAdmin()`.
