<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowtimeDate extends Model
{

    protected $table = 'showtimedates';

    public function showtime()
    {
        return $this->hasMany('App\Showtime');
    }
}
