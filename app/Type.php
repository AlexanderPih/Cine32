<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public function times()
    {
        return $this->belongsToMany('App\Time');
    }

    public function showtimestests()
    {
        return $this->belongsToMany('App\Showtimetest');
    }
}
