---
title: Campo Moneda (Currency field)
description: Gestión de campos de monedas (currencies)
extends: _layouts.documentation
section: content
locate: es
folder: fields
---

# Campo para moneda (Currency field)

Este campo, nos permitirá formatear la salida de un valor, ajustándose a la moneda seleccionada.

<div class="alert success">Este campo require de la instalación de la extensión para <strong>Php</strong>strong>: <i>INTL</i>.</div>

## Instalación de php-intl

Para instalarla la extensión de internacionalización de *Php*, haremos lo siguiente:

a) Instalación local en Mac:

```bash 
brew install intltool
```

b) En Ubuntu:

```bash 
sudo apt-get install php-intl
```

Y una vez instalado, reiniciar **Apache**, **Ngix**,...

### Utilización

El campo `Currency`, nos va a permitir gestionar las diferentes monedas y su formato. Este campo, está basado en la librería:

+ [http://moneyphp.org/en/stable/features/formatting.html](http://moneyphp.org/en/stable/features/formatting.html){.link-out}

Su funcionamiento básico sería:

```php 
use Daguilarm\Belich\Fields\Types\Currency;

/**
 * Get the fields displayed by the resource.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return Illuminate\Support\Collection
 */
public function fields(Request $request): array
{
    return [
        Currency::make('Currency', 'test_decimal')
            ->currency('DKK'),
        Currency::make('Currency euro', 'test_decimal')
            ->setLocale('es_ES')
            ->euro(),
        Currency::make('Currency dollar', 'test_decimal')
            ->setLocale('en_US')
            ->dollar(),
    ];
}
```
Los **códigos ISO** de las monedas, pueden consultarse en:

+ [https://es.wikipedia.org/wiki/ISO_4217](https://es.wikipedia.org/wiki/ISO_4217){.link-out}

### Métodos soportados

Por defecto, el sistema utilizará el navegador del usuario para determinar la configuración de idioma, pero esta configuración, podemos cambiarla con el método `setlocale()`:

```php 
Currency::make('Currency euro', 'test_decimal')
    ->setLocale('es_ES'),
```

Y utilizando el código de idioma del país ([Más información](https://www.w3.org/International/articles/language-tags/){.link-out}).

También podemos definir la moneda predeterminada, con el método `currency()` y los **códigos ISO** de las monedas:

```php 
Currency::make('Currency euro', 'test_decimal')
    ->currency('EUR'),
```

Para facilitar el trabajo, hemos creado unos *helpers*, para las monedas más utilizadas, que directamente configuran la moneda, sin necesidad de utilizar el método `currency()`:

+ `dollar()`: configura la moneda en dólares estadounidenses.
+ `euro()`: configura la moneda en euros.
+ `pound()`: configura la moneda en libras esterlinas.
+ `yen()`: configura la moneda en yenes japoneses.
+ `yuan()`: configura la moneda en yuanes chinos.
