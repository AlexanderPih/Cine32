<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{

    public function showtimes()
    {
        return $this->belongsToMany('App\Showtime');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
