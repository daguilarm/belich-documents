---
title: Acerca de Belich
description: Introducción a la documentación de Belich
extends: _layouts.documentation
section: content
locate: es
folder: home
---

# Acerca de Belich

**Belich** es un panel de administración basado en [Laravel](https://laravel.com){.link-out}. Mi principal influencia a la hora de desarrollarlo ha sido [bootforms](https://github.com/adamwathan/bootforms){.link-out} de [Adam Wathan](https://adamwathan.me/){.link-out}, que fue mi primera experiencia con un *package* que ofrecía una forma de crear formularios, que en aquel momento, me pareció espectacular... todo basado en métodos encadenados que al final definían un campo de formulario:

```php
{!! 
    BootForm::open()->action( route('users.update', $user) )->put()
        BootForm::text('First Name', 'first_name') 
            ->id('my first name')
    BootForm::bind($user)
    BootForm::close()
!!}
```

Mi objetivo siempre fue hacer algo así, y no fue hasa que surgió [Nova](https://nova.laravel.com){.link-out}, que continuando con esta idea y llevándola más alla, consiguió un producto completo y funcional. 

Empecé a trabajar con **Nova**, y al principio fue genial, pero entonces llegaron los primeros problemas. Mi proyecto exigía de una flexibilidad y funcionabilidades que **Nova** no me podía dar, así que me pasaba el día diseñando parches y *packages* para añadirle las funcionalidades que necesitaba. Al final, no tuve más remedio que empezar **Belich**, con la idea de intentar solucionar estos problemas, y sobre todo, dejando de lado los frameworks Javascript, como: [VueJS](https://vuejs.org/){.link-out}, [React](https://reactjs.org){.link-out} o incluso [Jquery](https://jquery.com/){.link-out}, mi objectivo era dejarlo todo (o casi todo) en manos de: [Php](http://php.net){.link-out}. 

Una vez empecé a desarrollar **Belich**, me surgío un problema importante: debía encontrar una forma de migrar mi viejo proyecto con **Nova** hacia **Belich**... así que opté por usar una sintaxis similar en la gestión de formularios, que era la parte más complicada para migrar (no quería que la migración se convertiera en una pesadilla).

Empecé cambiando todo el concepto de funcionamiento interno del código (ahora era renderizado directamente por **Blade** y no por **VueJS**) y sobre todo, añadiendo nuevas funcionalidades y simplificando procesos.

Otra gran influencia a la hora de desarrollar este proyecto, ha sido [Sharp](https://github.com/code16/sharp){.link-out} y su forma de abordar algunos problemas con el código.

La idea final es, ha sido la de poner todo el peso en la parte de `Php`, pero permitiendo la flexibilidad necesaria para que cada usuario, pueda integrar cualquier tecnología o **framework** que desee.

**¿Y todo esto para qué?** Básicamente, para ganar en simplicidad. Con **Belich** es muy realmente sencillo personalizar cualquier campo o sección, y todo ello, sin tener que desarrollar complejos componentes con **javascript**. 

Y por supuesto, todo el código construido desde cero, e intengrando las últimas tecnologías disponibles.

Requerimientos:

- php 7.4 >
- Laravel 6.x
