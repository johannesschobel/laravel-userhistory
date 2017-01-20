# Laravel Userhistory

Laravel Userhistory is a package that lets you document the activities, resective users has performed on Models.

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

Migrate the database using the following command:

``` bash
$ php artisan migrate
``` 

and start customizing the `config/userhistory.php` file.

The config entry `userhistory.models.user`, thereby, reference your main model. If you rely on the Laravel framework, 
this is already configured properly. The config entry `userhistory.models.userhistory`, however, references the 
Userhistory model. If you use the model provided by this package, everything is fine as well.

The `userhistory.actions` references a class, providing your actions, you want to be able to track. The package already 
ships with a few default actions (e.g., `SHOW`, `STORE`, `DELETE` and so on). However, you can add your own specific 
actions by simply creating your own class file like so:

``` php 
use JohannesSchobel\UserHistory\Enums\UserHistoryEnum;
class UserHistoryActions extends UserHistoryEnum {
   
   const CREATE = 100;
   const UPDATE = 101;
   const DELETE = 102;
   
   const PROFILE_CHANGED = 110;
   const PROFILE_PASSWORD_CHANGED = 111;
   
   // and so on.. 
}
```

Finally, add the `UserHistoryTrait`, which is defined in this package, to your `User` model by adding the following line:

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
   // create a log entry indicating that the user has updated a given record
   $history = $user->logAction($object, UserHistoryActions::UPDATE);
}

// continue with your business logic
```

To return all `Userhistory` objects for a given user, simply call

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

### More Complex Example

You can easily create some kind of `timeline`, which provides information about all actions a user has done. In this 
example, we will use the [League/Fractal](https://github.com/thephpleague/fractal) which provides `Transformers`. 
Furthermore, the Laravel framework is used.

First, we create a `UserHistoryTransformer`, which might look like this:

``` php
class UserHistoryTransformer extends TransformerAbstract
{
    public function transform(Userhistory $history)
    {
        $entity = $history->getEntity();
        
        return [
            'id' 	    => $history->id,
            'text'      => Lang::get('useractivities.' . strtolower($history->action), [], app()->getLocale()),
            'name'      => $entity->title,

            'uri'       => $entity->getSelfURI(),

            'created_at' => $history->created_at,
        ];
    }
}
```

Next, we will define respective endpoint, which will allow us to retrieve all required information. Lets create the
endpoint `GET /my/activities` in Laravel's route file.

Finally, wire the respective controller method and the transformer together. This might look like this:

``` php
class MyController extends Controller {
    // more methods here
    
    public function myActivities(Request $request) {
        $user = // authenticate the current user from the request (e.g., by using JWT)

        $histories = $user->userhistories;

        return $this->response()->collection($histories, new UserHistoryTransformer());
    }
}
```

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
