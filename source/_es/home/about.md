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

Mi objetivo siempre fue hacer algo así, y no fue hasta que surgió [Nova](https://nova.laravel.com){.link-out}, que continuando con esta idea y llevándola más alla, consiguió un producto completo y funcional. 

Entonces, empecé a trabajar con **Nova** y al principio todo fue genial, pero no tardaron en llegar los primeros problemas. Mi proyecto exigía de una flexibilidad y funcionabilidades que **Nova** no me podía dar. La situación era que me pasaba el día diseñando parches y *packages* para añadir las funcionalidades que necesitaba. Hay que matizar, que por aquel entonces, **Nova** estaba muy lejos de ser lo que es ahora, por aquel entonces tenía la impresión de que habían lanzado el producto sin terminar... hoy en día, es un producto mucho más completo y perfeccionado, aunque sigue siendo (para mi), un producto con una dependencia excesiva en **javascript**. 

Al final, decidí empezar **Belich**, con la idea de solucionar estos problemas, y sobre todo, teniendo en mente la idea de mantener alejado los *frameworks* basados en *javascript*, como: [VueJS](https://vuejs.org/){.link-out}, [React](https://reactjs.org){.link-out} o incluso [Jquery](https://jquery.com/){.link-out}. 

El objectivo, fue al final, el de dejar todo el protagonismo (o casi todo) a [Php](http://php.net){.link-out}. 

Una vez empecé a desarrollar **Belich**, me surgío un problema importante: debía encontrar una forma de migrar mi viejo proyecto con **Nova** hacia **Belich**... el principal problema lo veía en los recursos, ya que tenía cerca de 70 recursos creados, y la migración de todo aquello iba a ser un caos. Opté por intentar mantener cierta homogenidad en la forma de procesar estos archivos, para que la transición fuera sencilla, y esto me llevó a mantener cierta coherencia entre la sintaxis de ambos proyectos.

Todo esto, manteniendo en mente la idea de cambiar todo el concepto de funcionamiento interno del código, cambiando de raiz la forma en que se renderizaban los recursos, haciéndose ahora directamente mediante **Blade** en vez de **VueJS** como lo hacía **Nova**. Durante este proceso, surgieron algunos problemas técnicos, pero gracias a [Sharp](https://github.com/code16/sharp){.link-out} y su forma de abordar estas situaciónes, encontré algunas ideas interesantes.

A modo de resumen, el concepto sobre el que se ha desarrollado **Belich**, ha sido el de poner todo el peso en la parte de `Php`, pero siempre permitiendo la flexibilidad, para que cada usuario pueda integrar cualquier tecnología o **framework** que desee.

**¿Y todo esto para qué?** Básicamente, para ganar en simplicidad. Con **Belich** es muy realmente sencillo personalizar cualquier campo o sección, y todo ello, sin tener que desarrollar complejos componentes con **javascript**. 

Y por supuesto, todo el código construido desde cero, e intengrando las últimas tecnologías disponibles.

Requerimientos:

- php 7.4 >
- Laravel 6.x
