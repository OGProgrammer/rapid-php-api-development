# Lumen

Lumen 5.6

## Install

I created the lumen project with the composer create-project command below.

`composer create-project --prefer-dist laravel/lumen lumenapi`

I'm kind of shocked there are more dependencies here than Laravel itself which seems counter-intuitive to a micro-framework. However, I think it is because there is use of class path mapping vs PSR4 autoloading.

Test the project is working by launching the webserver and hitting `localhost:8000` in your browser.

`php -S localhost:8000 -t public`

I kind of cheated and copied the migration, controller, and model from the laravel example and tweaked it a bit.

You have to uncomment lines in `bootstrap/app.php` to enable other features like eloquent, facades, etc. 

`$app->withEloquent();`

## Details

73 packages - 27~ MB of files in `vendor/`

Mainly uses Laravel components with a few symfony ones.

Eloquent and other features are initially turned off when first installing lumen. 

## OGP Thoughts

Lumen was just as easy as installing the Laravel app. If you think your gonna build something super small/simple then maybe go for this Lumen framework. If you think it will evolve, it might be worth it to just go straight to Laravel or another "macro" framework.

This was relatively easy to setup and was a bit faster than the Laravel one but I did cheat and reuse the models/migrations from the Laravel example.

In the past when working with these "micro-frameworks", I've gone with a much simpler approach. I've built things with Silex and PDO before that turned out great so there would be no harm in just using raw PDO if you want to be "closer to the database".

It sometimes help to cut all the magic out if you really want something easy to understand and develop in.

## Ways to extend

You are pretty much working in Laravel so a ton should translate between the two if you wanted to leverage other packages.

@todo delete method don't work cause I think the "DELETE" HTTP method is doing something funny. Workaround might be just adding a `/delete` route to POST to.
