<?php
 
namespace JohannesSchobel\UserHistory\Traits;

use JohannesSchobel\UserHistory\Models\Userhistory;

trait UserHistoryTrait
{
    /**
     * Users can have many Userhistories.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function userhistories()
    {
        $model = config('userhistory.models.userhistory');
        return $this->hasMany($model)->orderBy("updated_at", "DESC");
    }

    /**
     * Creates a new Userhistory entry and returns it
     *
     * @param $obj
     * @param $action
     * @return Userhistory
     */
    public function logAction($obj, $action)
    {
        $actions = config('userhistory.actions');

        $userhistory = new Userhistory();
        $userhistory->user_id = $this->id;

        $userhistory->entity = get_class($obj);
        $userhistory->entity_id = $obj->id;

        $userhistory->action = $actions::getKeyForValue($action);
        $userhistory->action_id = $action;

        $userhistory->save();

        return $userhistory;
    }
}
