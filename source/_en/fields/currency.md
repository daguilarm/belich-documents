---
title: Currency fields
description: Management of currency fields
extends: _layouts.documentation
section: content
locate: en
folder: fields
---

# Currency fields

This field will allow us to format the output of a value, base on the selected currency.

<div class="alert success">This field requires the installation of the extension for <strong>Php</strong>strong>: <i>INTL</i>.</div>

## Php-intl install

To install the *Php* internationalization extension, we will do the following:

a) Local installation on Mac:

```bash 
brew install intltool
```

b) In Ubuntu:

```bash 
sudo apt-get install php-intl
```

And once installed, restart **Apache**, **Ngix**,...

### Utilization

The field `Currency`, will allow us to manage the different currencies and their format. This field is based on the library:

+ [http://moneyphp.org/en/stable/features/formatting.html](http://moneyphp.org/en/stable/features/formatting.html){.link-out}

Its basic operation would be:

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
The **ISO codes** of the currencies can be found at:

+ [https://es.wikipedia.org/wiki/ISO_4217](https://es.wikipedia.org/wiki/ISO_4217){.link-out}

### Supported methods

By default, the system will use the user's browser to determine the language setting, but this settings, can be changed with the method `setlocale()`:

```php 
Currency::make('Currency euro', 'test_decimal')
    ->setLocale('es_ES'),
```

And using the country language code ([More information](https://www.w3.org/International/articles/language-tags/){.link-out}).

We can also define the default currency, with the method `currency()` and the **ISO codes** for the currencies:

```php 
Currency::make('Currency euro', 'test_decimal')
    ->currency('EUR'),
```

To facilitate the work, we have created some *helpers*, for the most used currencies, which directly configure the currency, without using the `currency ()` method:

+ `dollar()`: Set the currency in US dollars.
+ `euro()`: Set the currency in euros.
+ `pound()`: set the currency in pounds sterling.
+ `yen()`: set the currency in Japanese yen.
+ `yuan()`: set the currency in Chinese yuan.
