---
title: Belich facades - System
description: Managing Belich's facades to get all the available information about the system
extends: _layouts.documentation
section: content
locate: en
folder: facades/belich
---

# Belich Facade: Sistema 

#### allowedActions() 

Returns an array with the actions supported by **Belich**, as they are (at the moment):

- index
- create 
- edit
- show

#### middleware() 

It returns an `array` with all the middlewares configured in`config\belich.php`

#### name()

We get the application name of the configuration file: `.\Config\belich.php`.

#### path() 

It is the path of the application. It is obtained from the configuration file: `.\Config\belich.php`.

#### pathName()

If when executing the previous method: `path()`, we will get the folder `dashboard/`, and if we calling the method `pathName`, we will get ` dashboard` without the bar.

#### url() 

It is the base url of the application. It is obtained from the configuration file: `.\Config\belich.php`.

#### version() 

The actual version of the package.
