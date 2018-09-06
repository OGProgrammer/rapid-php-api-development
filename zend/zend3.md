# Zend3

Zend Framework has been around for quite awhile being one of the first Frameworks for PHP. With the release of Zend Framework 3, it offers a very modular way of building your applications and microservices.

You can learn more about [Zend Framework here](https://framework.zend.com/learn) and RougeWave offers formal training also. They offer ZendServer which works wonderfully with Zend Framework and is a very solid "out-of-the-box" solution to creating applications with the comfort of knowing you can get support (paid) when needed. Plus the community is there to ask also which for APIs, most pointed to APIgility first before purly ZFW3 but it can be done.

I found this repo [Tony133/ZF3-ApiRest](https://github.com/Tony133/ZF3-ApiRest) and edited it a bit for this example. There is also this video that shows how to make a [CRUD application](https://www.youtube.com/watch?v=Fw8Hq6ws_ZM) but didn't end up needing it (has other CRUD tutorial videos in other frameworks too).

## Install

Check out the [Getting Started](https://docs.zendframework.com/tutorials/getting-started/skeleton-application/) page for more information about installing the MVC skeleton application.

From there a few packages were added such as Doctrine2. Once dependencies are installed, then you con start configuring the app.

Now create the database and edit the DB connection info in `config/autoload/global.php`.

Dump your schema with the following command:

`php vendor/bin/doctrine-module orm:schema-tool:create`

Start the server with:

`php -S 0.0.0.0:8080 -t public/ public/index.php`

Now checkout the notes api endpoint by visiting `127.0.0.1:8080/api/note`

POST, PUT, GET, and DELETE working (PATCH is missing)

## OGP Thoughts

Upon first glance I was reluctant to make a pure zend 3 approach due to APIgility and Expressive being based off Zend3 modules. Since this talk was intended to cover it, I was determined to create an example in Zend3 along with the proper APIgility and Expressive examples.

I couldn't find much in the ways of REST API tutorials for zend 3 purely but did manage to find a video and repo that helped me get an exmaple working. I would say unless you have an existing project in Zend, maybe try APIgility or Expressive first before attacking it with the skeleton MVC application project from scratch.
