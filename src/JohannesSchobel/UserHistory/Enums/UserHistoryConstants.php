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

    const NOTHING       =  0;

    const SHOW          =  1;
    const CREATE        =  2;
    const UPDATE        =  3;
    const DELETE        =  4;
    const READ          =  5;

    const ACTIVATED     =  6;
    const DEACTIVATED   =  7;

    const SUBSCRIBED    =  8;
    const UNSUBSCRIBED  =  9;

    const LIKE          = 10;

    const TOUCH         = 11;
}