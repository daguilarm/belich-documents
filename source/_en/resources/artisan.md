---
title: Resources
description: Resource management with Belich
extends: _layouts.documentation
section: content
locate: en
---

# Recursos

**Belich** has an `artisan` command, which will allow you to create resources easily and quickly:

```php
php artisan belich:resource ResourceName
```

You can find more information at: [Console commands](commands), where all available options are specified.

Remember to use the ***Laravel*** *conventions* or **Belich** will not work properly: 

- The name of the resource in English and *UpperCamelCase*. Example: User (`App\Belich\Resources\User.php`).
- The name of the model in English and *UpperCamelCase*. Example: User (`App\User.php`).

That is, the name of the resource and the model should match (although it is not essential, but generally, it must be the norm).
