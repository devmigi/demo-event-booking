<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{



    /**
     * Get User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }



}
