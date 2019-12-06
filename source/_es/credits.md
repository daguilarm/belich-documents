# El proyecto

Belich surge como un reto personal para profundizar en el conocimiento del [Framework Laravel](https://laravel.com), y por supuesto, en [PHP](http://php.net). Para ello, me propuse, a modo de ejercicio, el desarrollo desde cero de [Laravel Nova](https://nova.laravel.com/). 

No se trataba de copiar el código de Nova, de hecho, no tiene nada que ver. La idea, era inspirarse en la documentación de Nova (magnífica!) para crear un sistema de administración, reduciendo a la mínima expresión el uso de Javascript, y por tanto, dejando a un lado [VueJS](https://vuejs.org/) u otras librerias. 

Nova ya había llevado a VueJS a otro nivel, no era plan de reinventar la rueda, simplemente, pensaba que aunque Nova era una maravilla, tenía algunas limitaciones y sobre todo, le faltaba flexibilidad.

La primera versión de **Belich**, utilizaba [Jquery](https://jquery.com/), pero solo para lidiar con las funciones básicas de interactuación con el navegador del usuario, la idea era eliminarlo conforme otros proyectos (prometedores) como [Laravel Livewire](http://calebporzio.com/proof-of-concept-phoenix-liveview-for-laravel/) o [phpx](https://github.com/preprocess/example-phpx-live). 

El objetivo, era utilizar esta tecnología para desarrollar un panel de administración basado en back-end.

Al final se ha optado por un sistema sin Frameworks javascript, utilizando vanilla js.

## Créditos

- [Damián Aguilar](https://github.com/daguilarm/)

## Librerías y código utilizado

#### Packages
- [Blade X](https://github.com/spatie/laravel-blade-x)
- [FastExcel](https://github.com/rap2hpoutre/fast-excel)
- [Nick Goris](https://github.com/nckg/laravel-minify-html)

#### Charts
- [ChartistJS](https://github.com/gionkunz/chartist-js)
- [CodeYellowBV](https://github.com/CodeYellowBV/chartist-plugin-legend)

#### HTML / JS / CSS
- [Tailwindcss v1.1.2](https://tailwindcss.com)
- [Markdown editor](https://gist.github.com/cferdinandi/2218858af04d5306904fe57c184fc17a)
- [Mustafa Ehsan](http://mustafaehsan.com/2017/tailwind-css-building-a-login-page/)
- [Ruslan Nigmatulin](https://jsfiddle.net/avadon/ta2xobzc/4/)
- [Vanilla masker](https://github.com/vanilla-masker/vanilla-masker)
- [Js Tabs](https://sumtips.com/snippets/javascript/tab-in-textarea/)
