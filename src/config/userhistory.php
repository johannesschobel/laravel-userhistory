<?php

namespace JohannesSchobel\UserHistory\Http\Enums;

/**
 * Class UserHistoryActions
 * Lists all possible "actions", which can be used to store within the userhistory database!
 * You can access them in a "static way" (e.g., UserHistoryActions::UPDATE)
 *
 * @package JohannesSchobel\UserHistory\Http\Enums
 */
abstract class UserHistoryActions extends Enum {
    const NOTHING   = 0;
    const STORE     = 1;
    const UPDATE    = 2;
    const DESTROY   = 3;
}

return [
    /* The model which is returned for one userhistory object */
    'userhistory' => 'JohannesSchobel\UserHistory\Models\Userhistory',
];