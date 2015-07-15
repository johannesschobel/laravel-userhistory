# Laravel Userhistory

## Install

Via Composer

``` bash
$ composer require johannesschobel/laravel-userhistory
```

## Getting Started

Install the package via composer (see above) or require it directly in your composer.json file using:

``` bash
"require" : {
   ...
   "johannesschobel/laravel-userhistory" : "dev-master",
   ...
},
...
```

Add the new Package to your providers within your `config/app.php` file:

``` php
'providers' => [
   ...
   'JohannesSchobel\UserHistory\UserHistoryServiceProvider',
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

and start customizing the `config/userhistory.php` file. To add additional `actions`, simply add another `const` within the UserHistoryActions class.

Finally, add the `UserHistoryTrait` to your User Model with

``` php
use UserHistoryTrait;
```

This will add the needed functions to your Model.

## Usage

To log the user action, simply do something like this:

``` php
...
// assume, that $user is the current user
// e.g., $user = Auth::user();

// also assume, that $object is an object to be saved to the database
$object->name = "foo";
$object->description = "bar";
$result = $object->save();

if($result) {
   $user->addHistory($object, UserHistoryActions::UPDATE);
   return redirect()->route("/");
}
...
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
	...
}
```

If you would like to create a timeline, showing all actions a user made, there is already a `userhistory` language file available.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Johannes Schobel][https://github.com/johannesschobel]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/league/:package_name
[link-travis]: https://travis-ci.org/thephpleague/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/:package_name
[link-downloads]: https://packagist.org/packages/league/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
