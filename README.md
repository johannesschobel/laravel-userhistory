# Laravel Userhistory

## Install

Via Composer

``` bash
$ composer require johannesschobel/laravel-userhistory
```

## Getting Started

Install the package via composer (see above) or require it directly in your `composer.json` file using:

``` json
"require" : {
   ...,
   "johannesschobel/laravel-userhistory" : "dev-master",
   ...
},
```

Add the new Package to your providers within your `config/app.php` file:

``` php
'providers' => [
   ...
   JohannesSchobel\UserHistory\UserHistoryServiceProvider::class,
   ...
],
```

Then, use the publish command to add the required files to your project:

``` bash
$ php artisan vendor:publish --provider="JohannesSchobel\UserHistory\UserHistoryServiceProvider"
```

Migrate the database using

``` bash
$ php artisan migrate
``` 

and start customizing the `config/userhistory.php` file.

The package ships with a few default actions (e.g., `SHOW`, `STORE`, `DELETE` and so on).
However, you can add your own specific actions by simply creating your own class:

``` php 
class UserHistoryActions extends UserHistoryConstants {
   const TEST = 11;
   const FOO = 12;
   const BAR = 13;
}
```
### ! Heads up !
**Note, that the operations 0 to 99 are currently reserved for future changes.**
**If you define your own actions, start with ID 100!**

Finally, add the `UserHistoryTrait` to your `User` model by adding the line

``` php
use UserHistoryTrait;
```

## Usage

To log a user's action, simply do something like this:

``` php
// assume, that $user is the current user
// e.g., $user = Auth::user();

// also assume, that $object is an object to be saved to the database
$object->name = "foo";
$object->description = "bar";
$result = $object->save();

if($result) {
   // log, that the user have updated a given record
   $history = $user->logAction($object, UserHistoryActions::UPDATE);
}

// continue with your business logic
```

To return all UserHistory Elements for a given user, simply call

``` php
// assume, that $user is the current user
// e.g., $user = Auth::user();
$userhistories = $user->userhistories;
foreach($userhistories as $userhistory) {
	$obj = $userhistory->getEntity();
	// object is now null (if the entity does not exist)
	// or it is an object of the given model class!
}
```

If you want to create a timeline, showing all actions a user made, there is already a `userhistory` language file available.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- Johannes Schobel [https://github.com/johannesschobel]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/johannesschobel
[link-contributors]: ../../contributors
