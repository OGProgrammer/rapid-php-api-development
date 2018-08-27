# Symfony 4 - Flex

Symfony 4 features a new way to install recipes using a powerful composer plugin called "Flex" which takes advantage of composers ability to run scripts which auto-configures your dependencies.

Most of this example was pulled from their [official docs](https://symfony.com/doc/current/setup.html).

There is also a [Symfony Demo Application](https://github.com/symfony/demo) available if you want to see more on how to build a full-fledged website with it.

If you are more of a visual guy and need a video tutorial then check out Ryan Weaver's amazing horde of screencasts at [KNP University](http://knpuniversity.com). I don't think I've seen tech programming videos as entertaining as his. Very creative and cool dude, props.

There are also a ton of resources on [SensioLabs](https://sensiolabs.com/en) site. Shout out to *Fabien Potencier* for founding Symfony, SensioLabs, and Blackfire.io which are all amazing.

## Install

Create the Symfony skeleton project with composer (Note there is a `website-skeleton` project too if you need a frontend and other symfony goodies). I'd recommend using this unless you want to do more manual work and cut out any "fat" or helper stuff from the project.

`composer create-project symfony/skeleton symfonyapi`

You can install the web-server bundle but I'm just gonna do this without adding too much to keep it slim and simple (_aka, I like to make my life harder than it needs to be_). We can just use the built in web server within the `php` binary to pull the same thing off.

`php -S 127.0.0.1:8000 -t public`

To make your life easier, you should use the `maker-bundle` which allows you to auto-generate some base code like Controllers, Entities, etc.

`composer require symfony/maker-bundle --dev`

I recommend using annotations for your routes instead of the default `yaml` configs. Simply run `composer require annotations` to install that feature.

I ❤ Doctrine so I ran the Flex package like so `composer require doctrine` (Note that Flex leverages aliases in packages when running `composer require` which is super slick! You can read more about using [Flex in Symfony](https://symfony.com/doc/current/setup/flex.html) or you can see a list of Flex packages on this helpful site called [FlexRecipes.org](http://flexrecipes.org/). I just straight up guessed this package name for Doctrine and it just worked (haha +1 for Flex) as it just aliases the `symfony/orm-pack` package)

Next I created the database like so `php bin/console doctrine:database:create`

Then I edited the `.env` file with a valid database connection user/pass/host.

I need an entity for my Note so I just ran `php bin/console make:entity` which has an AMAZING wizard to walk you through building your model.

You can generate a migration script based off your new entities with ` bin/console make:migration`

To run the migrations, simply execute `php bin/console doctrine:migrations:migrate`

If you want to add more fields, just repeat the above steps and it will create new ALTER migrations to keep your remote environments in sync.

Now to create the controller, we can run `bin/console make:controller NotesController` and that will generate an empty controller.

From there I've pretty much followed the [Doctrine/Symfony Docs](https://symfony.com/doc/current/doctrine.html) to get the CRUD routes setup.

I leveraged the autowire features on my routes so I have access right away to things like the hydrated database model, the entity manager, and the request object.

This was by far the most pleasing to develop in and with my prior Symfony experience, was as easy as 1, 2, 3.

## OGP Thoughts

I've been developing in PHP now for over 10+ years and what I've seen change recently is a move towards "commands" and "conventions" to speed up development. 

I can't say I'm a fan of these "easy to use commands" when teaching junior developers who are too lazy to research & understand what these commands are doing under the hood. 

DON'T GET ME WRONG! I use these commands now over doing things manually; but I've also done this stuff manually before so I have some understanding of how things are being wired together and what these `make` or other commands are doing. 

One key trait I've seen in _really_ really good Senior developers is that they are not afraid to big deeper and truly understand how the "magic" works. For example: something isn't working as expected in your framework, you go into the framework code and debug why it isn't behaving as expected.

I'm bias towards other frameworks just because Symfony 2 is where I became a wizard. I'm also a big proponent of BDD or just Automated Testing in general so things like `Facades` make me rage. Teaching a Jr. Dev how to write a good unit test and using dependency injection so you can mock classes is an essential step in becoming an elite dev.

Symfony 4 made the right move with Flex because in some ways they need to compete with Laravels "ease of use". This misconception that Symfony is "hard" is just plain wrong.

Just as I, when you develop a ton within a framework that you like for the first time; you become addicted to it. As the saying goes, when you have a hammer; everything looks like a nail.

I'd say it is in your best interest as a good PHP developer to explore each framework and understand the design paradigms and patterns used within them. Only then, will you become a master PHP craftsman.

## Ways To Extend

If you want an easy way to generate CRUD controllers for your Entity, you can run `bin/console make:crud`

If you want a docker environment, I recommend forking https://github.com/eko/docker-symfony and making your own wiz-bang local environment with it.

API Platform is built with Symfony 4 and might be worth checking out.

The "Friends of Symfony" packages are great too (like `FOSRestBundle`) and don't forget to browse through the available Flex packages available. 