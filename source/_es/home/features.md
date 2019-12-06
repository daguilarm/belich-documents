---
title: Características
description: Características de Belich dashboard
extends: _layouts.documentation
section: content
locate: es
folder: home
---

# Características 

- Barra de navegación superior o lateral.
- Descarga directa de los recursos, en formato: EXCEL o CSV.
- Gestión de autorización mediante `Policies`, totalmente integrada.
- Iconos de [Fontawesome](https://origin.fontawesome.com){#id} integrados.
- Gestión de caché.
- Minificación de HTML (con filtros y totalmente personalizada).
- Personalización de:
    + Botones de acción.
    + Barra de navegación superior.
    + Barra lateral.
    + Breadcrumbs.
    + Thumbnails.
    + Página inicial o dashboard.
    + etc...
- Gráficas:
    + Usando [Chartist](https://gionkunz.github.io/chartist-js/index.html), libreria ultra ligera.
    + Herramientas preconfiguradas para un desarrollo rápido.

A modo de ejemplo, para mostrar los usuarios registrados en la última semana, sólo tendríamos que añadir lo siguiente:

```php
use App\User;
use Daguilarm\Belich\Components\Metrics\Eloquent\Connection;
use Daguilarm\Belich\Components\Metrics\Labels;
use Illuminate\Http\Request;

/**
 * Set the displayable labels
 *
 * @return string
 */
public function labels(Request $request) : array
{
    return Labels::daysOfTheMonth();
}

/**
 * Calculate from model
 *
 * @return string
 */
public function calculate(Request $request) : array
{
    return Connection::make(User::class)
        ->cacheInMinutes(10, $this->uriKey())
        ->thisWeek()
        ->totalByDay();
}
```
