<?php

namespace JohannesSchobel\UserHistory\Http\Traits;

use JohannesSchobel\UserHistory\Http\Enums\UserHistoryActions;
use JohannesSchobel\UserHistory\Models\Userhistory;

trait UserHistoryTrait
{
    /*
    |----------------------------------------------------------------------
    | UserHistory Trait Methods
    |----------------------------------------------------------------------
    |
    */

    /**
     * Users can have many Userhistories.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function userhistories()
    {
        $model = config('userhistory.userhistory', 'JohannesSchobel\UserHistory\Models\Userhistory');
        return $this->hasMany($model)->orderBy("updated_at", "DESC");
    }

    public function addHistory($obj, $action) {

        $userhistory = new Userhistory();
        $userhistory->user_id = $this->id;

        $userhistory->entity = get_class($obj);
        $userhistory->entity_id = $obj->id;

        $userhistory->action = UserHistoryActions::getValue($action);
        $userhistory->action_id = $action;

        $userhistory->save();
    }
}
