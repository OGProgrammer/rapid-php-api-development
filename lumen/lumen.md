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


## TODO

@todo delete method don't work