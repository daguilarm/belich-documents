# Belich Facade: Sistema 

#### allowedActions() 

Devuelve un array con las acciones soportadas por Belich, como son (de momento):

- index
- create 
- edit
- show

#### middleware() 

Nos devuelve un `array` con todos los middlewares configurados en `config\belich.php`

#### name()

Obtenemos el nombre de la aplicación del archivo de configuración: `.\config\belich.php`.

#### path() 

Es el path de la aplicación. Se obtiene del archivo de configuración: `.\config\belich.php`.

#### pathName()

Si al ejecutar el método anterior `path()`, obtenemos la carpeta (por ejemplo) `dashboard/`, al llamar al método `pathName`, obtendremos `dashboard` sin la barra.

#### url() 

Es la url base de la aplicación. Se obtiene del archivo de configuración: `.\config\belich.php`.

#### version() 

Nos devuelve la versión action del package.
