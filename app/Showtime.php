<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{

    public function showtimedate()
    {
        return $this->belongsTo('App\ShowtimeDate');
    }

    public function times()
    {
        return $this->belongsToMany('App\Time');
    }
}
