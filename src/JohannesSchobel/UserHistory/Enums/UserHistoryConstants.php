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

    const SUBSCRIBE     =  8;
    const UNSUBSCRIBE   =  9;

    const LIKE          = 10;
    const DISLIKE       = 11;

    const OK            = 12;
    const NOT_OK        = 13;

    const TOUCH         = 15;



    const SMILE         = 20;
    const LAUGH         = 21;
    const PARTY         = 22;
    const HEART         = 23;
    const SAD           = 24;
    const CONFUSED      = 25;

}