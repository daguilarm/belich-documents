---
title: About Belich
description: Belich documentation introduction
extends: _layouts.documentation
section: content
locate: en
folder: home
---

# About Belich

**Belich** is an administration panel based on [Laravel](https://laravel.com){.link-out}. My main influence when developing it has been [bootforms](https://github.com/adamwathan/bootforms){.link-out} by [Adam Wathan](https://adamwathan.me/){.link-out}, that was my first experience with a *package* that offered a way to create forms, in a way I thought was spectacular ... all based on chained methods that finally defined a form field:

```php
{!! 
    BootForm::open()->action( route('users.update', $user) )->put()
        BootForm::text('First Name', 'first_name') 
            ->id('my first name')
    BootForm::bind($user)
    BootForm::close()
!!}
```

My goal was always to do something like that, and it wasn't until it came up [Nova](https://nova.laravel.com){.link-out}, that continuing with this idea and taking it further, it got a complete and functional product.

Entonces, empecé a trabajar con **Nova** y al principio todo fue genial, pero no tardaron en llegar los primeros problemas. Mi proyecto exigía de una flexibilidad y funcionabilidades que **Nova** no me podía dar. La situación era que me pasaba el día diseñando parches y *packages* para añadir las funcionalidades que necesitaba. Hay que matizar, que por aquel entonces, **Nova** estaba muy lejos de ser lo que es ahora, por aquel entonces tenía la impresión de que habían lanzado el producto sin terminar... hoy en día, es un producto mucho más completo y perfeccionado, aunque sigue siendo (para mi), un producto con una dependencia excesiva en **javascript**. 

I started working with **Nova**, and at first it was great, but then the first problems arrived. My project required flexibility and functionality that **Nova** could not give me. The situation was that I spent the day designing *patches* and *packages* to add the functionalities I needed. I must clarify, that at that time, **Nova** was far from being what it is now, at in that time I had the impression that they had launched an unfinished product ... today, it is a much more complete and perfected product, although it remains (for me), a product with an excessive dependence on **javascript**.

In the end, I decided to start **Belich**, with the idea of solving these problems, and above all, having in mind the idea of keeping away *frameworks* based on *javascript*, such as: [VueJS](https://vuejs.org/){.link-out}, [React](https://reactjs.org){.link-out} or even [Jquery](https://jquery.com/){.link-out}. 

The goal, in the end, was to leave all the prominence (or almost everything) to [Php](http://php.net){.link-out}. 

Once I started developing **Belich**, I had an important problem: I had to find a way to migrate my old project with **Nova** to **Belich**... I saw the main problem in the resources, since it had about 70 of them created, and migrating all the resources look lika a chaos. I finally opted to try to maintain some homogeneity in the way of processing these files, in order to keep the transition as simple as possible, and this led me to maintain some consistency between the syntax of both projects.

All this, keeping in mind the idea of changing the whole concept of the internal code operation, changing the way in which the resources were rendered, now working directly through **Blade** instead of **VueJS** as It was with **Nova**. During this process, some technical problems arose, but thanks to [Sharp](https://github.com/code16/sharp){.link-out} and his way of addressing these situations, I found some interesting ideas.

As a summary, the concept on which **Belich** has been developed, is to put all the weight in the `Php` part, but always allowing the necessary flexibility, so that each user can integrate any technology or *framework* you want.

**And all this for what?** Basically, to win in simplicity. With **Belich** is very easy to customize any field or section, and all this simplicity, without having to develop complex components with **javascript**.

And of course, all the code built from scratch, and integrating the latest available technologies.

Requirements:

- php 7.4 >
- Laravel 6.x
