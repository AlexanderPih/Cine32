<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenone extends Model
{

    public function showtimes()
    {
        return $this->hasMany('App\Showtime');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
