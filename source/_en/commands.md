---
title: Console commands
description: Belich console commands
extends: _layouts.documentation
section: content
locate: en
---

# Console commands

### Install Belich 

Install the **Belich** package in your copy of Laravel.

```bash
php artisan belich:install
```

### New resource

```bash
php artisan belich:resource Resource
```

>The resource name must be in the singular.

The resource will be created in:

```php
\App\Belich\Resources\Resource;
```

Several configuration options are available, for example, you can specify the path of the model, and therefore, be included in the code:

```bash
php artisan belich:resource Resource  --model='App\Models\MyModel'
```

Belich also allows you to create the model at the same time as the resource:

```bash
php artisan belich:resource Resource  --model='App\Models\MyModel' --create
```

>Remember that the model path must not include `\` initially, that is, avoid `--model='\App\Models\MyModel'` and use `--model='App\Models\MyModel'`

### New Policies

```bash
php artisan belich:policy NamePolicy --model='App\Models\MyModel'
```

>The policy name must be in singular, start with uppercase and contain the word: `Policy` right after.

El modelo `--model`, es opcional. Si lo deja en blanco, se utilizará el nombre de la *Política*, en la carpeta por defecto de laravel, quedando así en la política que ha creado:

The `--model` param is optional. If you leave it blank, **Belich** will use the name of the *Policy* (as model name), and create it in the default folder of laravel:

```php
use App\Name;
```

If you want to specify a custom route for the model (as shown in the first example), avoid including `\` at the beginning of the model path.

>You can continue using Laravel directly to create your policy. Simply, you will have to adapt it to the requirements of **Belich**.

### Create a Metric/Graph

```bash
php artisan belich:metric MetricName
```

And the metric will be created in:

```php
\App\Belich\Metrics;
```

### Create a component or custom form field

```bash
php artisan belich:component CustomField
```

We will create the custom field, on the route:

```php
\App\Belich\Components\CustomField;
```

For more information visit: [Custom componentss](fields/custom)
