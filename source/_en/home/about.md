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

I started working with **Nova**, and at first it was great, but then the first problems arrived. My project required flexibility and functionality that **Nova** could not give me, so I spent all the day designing patches and *packages* to add the features I needed. In the end, I had no choice but to start **Belich**, with the idea of trying to solve all these problems, and above all, leaving aside **Javascript frameworks**, such as: [VueJS](https://vuejs.org/){.link-out}, [React](https://reactjs.org){.link-out} or even [Jquery](https://jquery.com/){.link-out}, my final goal was to leave everything (or almost everything) in the hands of: [Php](http://php.net){.link-out}. 

Once I started developing **Belich**, I had an important problem: I had to find a way to migrate my old project with **Nova** to **Belich**... so I chose to use a similar syntax in the form management, which was the most complicated part to migrate (I didn't want migration to become a nightmare).

I started by changing the whole concept of internal code operation (now it was rendered directly by **Blade** and not by **VueJS**) and above all, adding new functionalities and simplifying processes.

Another great influence when developing this project has been [Sharp](https://github.com/code16/sharp){.link-out} and how to address some problems with the code.

The final idea has been to put all the weight in the `Php` part, but allowing the necessary flexibility so that each user can integrate any technology or **framework** that they want.

**And all this for what?** Basically, to win in simplicity. With **Belich** is very easy to customize any field or section, and all this simplicity, without having to develop complex components with **javascript**.

And of course, all the code built from scratch, and integrating the latest available technologies.

Requirements:

- php 7.4 >
- Laravel 6.x
