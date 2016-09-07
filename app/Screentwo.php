<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screentwo extends Model
{

    public function showtimes()
    {
        return $this->hasMany('App\Showtime');
    }

    public function types()
    {
        return $this->hasOne('App\Type');
    }
}
