# CakePHP

Cake 3.6 - Used cookbook [REST](https://book.cakephp.org/3.0/en/development/rest.html) tutorial 

## Install

Create the CakePHP Project with composer.

`composer create-project --prefer-dist cakephp/app cakeapi`

Configured the project to just use `.env` which cake by default used the `config/app.php` defaults.

Then I copied the example code from the tutorial on the controller into my `NotesController.php` and created the `/api` route in the `config/routes.php` file.

After that, I created a migration for the notes schema `bin/cake migrations create Notes` I added the sql types and columns for our note.

Then I kicked off the built in web server `bin/cake server -p 8765` and hit the route.

http://localhost:8765/api/notes.json

## Details

47 Packages - 24~ MB of files in `vendor/`

Use of Symfony components

Twig templating

The CakePHP ORM borrows ideas and concepts from both ActiveRecord and Datamapper patterns. 

### OGP Thoughts

It was relatively easy to setup this basic API. I would have to start converting this to use Tables/Entities to make it more meaningful.

It took me about an hour of playing with CakePHP to get this basic REST API going. I've never touched CakePHP before so this would have been much quicker for someone who knows how Cake's ORM works.

## Ways to Extend

Continue to follow the tutorial to get through JWT Authentication in the tutorial to lock the API down.

Use other features like "timestamp" to add to our Notes entity. Adding a Table and Repository objects along with a matching entity objects.

I'd also refactor to use proper HTTP status response codes - can be done with [response objects](https://stackoverflow.com/questions/1100867/how-do-you-specify-an-http-status-code-in-cakephp/11474836#44608115).

Looks like CakePHP supports PSR7 middleware from the looks of this [cakephp middleware article](https://www.dereuromark.de/2018/04/22/middleware-and-cakephp/).
