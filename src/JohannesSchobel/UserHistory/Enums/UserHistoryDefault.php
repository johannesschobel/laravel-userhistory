<?php

namespace JohannesSchobel\UserHistory\Enums;

/**
 * Class UserHistoryActions
 * Lists all possible "actions", which can be used to store within the userhistory database!
 * You can access them in a "static way" (e.g., UserHistoryActions::UPDATE)
 *
 * @package JohannesSchobel\UserHistory\Enums
 */
class UserHistoryDefault extends UserHistoryEnum {

    const DEFAULT_NOTHING       =  0;

    const DEFAULT_SHOW          =  1;
    const DEFAULT_CREATE        =  2;
    const DEFAULT_UPDATE        =  3;
    const DEFAULT_DELETE        =  4;
    const DEFAULT_READ          =  5;

    const DEFAULT_ACTIVATE      =  6;
    const DEFAULT_DEACTIVATE    =  7;

    const DEFAULT_SUBSCRIBE     =  8;
    const DEFAULT_UNSUBSCRIBE   =  9;

    const DEFAULT_LIKE          = 10;
    const DEFAULT_UNLIKE        = 11;

    const DEFAULT_OK            = 12;
    const DEFAULT_NOT_OK        = 13;

    const DEFAULT_TOUCH         = 15;

    const DEFAULT_PROFILE_CHANGED           = 50;
    const DEFAULT_PROFILE_PASSWORD_CHANGED  = 51;
    const DEFAULT_PROFILE_PASSWORD_FORGOT   = 52;

}