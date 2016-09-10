<?php

namespace JohannesSchobel\UserHistory\Enums;

/**
 * Class UserHistoryActions
 * Lists all possible "actions", which can be used to store within the userhistory database!
 * You can access them in a "static way" (e.g., UserHistoryActions::UPDATE)
 *
 * @package JohannesSchobel\UserHistory\Enums
 */
class UserHistoryConstants extends Enum {

    const NOTHING   = 0;
    const SHOW      = 1;
    const STORE     = 2;
    const UPDATE    = 3;
    const DESTROY   = 4;
    const TOUCH     = 5;
}