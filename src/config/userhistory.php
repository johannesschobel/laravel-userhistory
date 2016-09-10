<?php

return [
    /* The model which is returned for one userhistory object */
    'models' => [
        'user' => config('auth.model'), // the main user model from laravel
        'userhistory' => \JohannesSchobel\UserHistory\Models\Userhistory::class,
    ]
];