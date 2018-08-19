# Vanilla PHP

I'd recommend shying away from plain vanilla PHP unless you for sure, for sure know what you are doing. (and even then, you probably shouldn't but if you insist...)

If I were forced to, I'd probably still use composer to pull in `symfony/http-foundation` and other components to help out like Doctrine for API Models/Repositories.

You can find an example of a [https://github.com/php-vegas/starter-app](simple php site) and use bits of it for an API app instead.

There are a few "Quick RESTful PHP API" tutorials out there but honestly, I'd advise from a security and maintenance standpoint you just pick any _major_ open-source framework that either your team or you are good in or end up enjoying. It will save you a ton of time later when other devs or the product owner throws big feature requests at you.