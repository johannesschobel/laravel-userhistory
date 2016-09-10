<?php

namespace JohannesSchobel\UserHistory\Models;

use Illuminate\Database\Eloquent\Model;

class Userhistory extends Model {

    /**
     * Relationship between User and Userhistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(config("userhistory.models.user"));
    }

    /**
     * returns the entity of the given class
     * or null if the class was not found!
     *
     * @return mixed
     */
    public function getEntity() {
        $class = $this->entity;

        if(!class_exists($class)) {
            // the class does not exist
            return null;
        }

        // get the object of the respective class!
        $object = call_user_func($class . '::findOrFail', $this->entity_id);

        return $object;
    }
}