# ZF3-ApiRest

[![Build Status](https://travis-ci.org/Tony133/ZF3-ApiRest.svg?branch=master)](https://travis-ci.org/Tony133/ZF3-ApiRest)

Simple Example Api Rest with ZF3 and Doctrine 2

## Install with Composer

```
	$ curl -s http://getcomposer.org/installer | php
	$ php composer.phar install or composer install
```

Start the dev server

```
php -S 0.0.0.0:8080 -t public/ public/index.php
```

Dump Database with

```
# create schema
php vendor/bin/doctrine-module orm:schema-tool:create
#drop schema
vendor/bin/doctrine-module orm:schema-tool:drop --force
```

Based off of tony133/zf3-api-rest