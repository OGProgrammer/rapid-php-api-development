# Laravel

Laravel 5.6 following parts of this tutorial by [Andre Castelo](https://www.toptal.com/laravel/restful-laravel-api-tutorial) but the [official Laravel docs](https://laravel.com/docs/5.6) are also a good resource.

## Install

Create the Laravel Project with composer.

`composer create-project --prefer-dist laravel/laravel laravelapi`

This will copy the `.env.default` to `.env` so just edit the `.env` with your DB info.

I created a migration for my note and added the columns needed in the migration created.

`php artisan make:model Note -m` 

This command also creates the entity object for you but you can just use `php artisan make:migration notes` to just create the migration.

Then I ran migrations against the database with `php artisan migrate:fresh`

I've copied the tutorials "CRUD" controller example code into my NotesController that I made with `php artisan make:controller NotesController`.

Wire up the controller with your `routes/api.php` API Routes file. Note I dodged authentication for this demo.

Kick off the webserver with `php artisan serve` and checkout `http://localhost:8000/api/notes` to get your notes.

Note: I skipped the whole Laravel Seed section of the tutorial as I'm not a huge fan of putting fake data into any application unless it is for testing so I skipped adding the seed jobs.

## Details

70 Packages - 35~ MB of files in `vendor/`

Use of some Symfony components

Blade templating

The database layer is driven by Eloquent ORM which follows the ActiveRecord pattern.

## OGP Thoughts

Super easy to setup the basic API and pretty painless. There are a ton of Laravel devs out there which means there are a ton of resources to look up also.

This took me about 30 minutes (while writing this too) but I already used Laravel a few times before. I kind of already knew where to go, what `artisan` commands to run, and so forth. By no means am I a Laravel expert and I'm sure there is quite a bit missing here still.

My only hesitation would be a personal bias against ORMs that use the ActiveRecord pattern. However, I'm sure you could replace Eloquent with Doctrine but why would you want to. I'm a big proponent of sticking with the tools that a framework gives you out the box (or PSR7 middleware or packages built specifically for your framework).
 
If my team knew Laravel then I'd go with Laravel. However, if I were building something by myself (without future team members on the project) then I'd go with I feel most comfortable in unless the product owner demanded using a specific framework.

## Ways to Extend

API Authentication via [Passport](https://laravel.com/docs/5.6/passport)
