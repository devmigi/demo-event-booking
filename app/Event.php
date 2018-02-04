<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    /**
     * Get Event Registrations
     */
    public function tickets()
    {
        return $this->hasMany('App\EventUser');
    }

}
