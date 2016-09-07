<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    public function screenones()
    {
        return $this->belongsToMany('App\Screenone');
    }

    public function screentwos()
    {
        return $this->hasOne('App\Screentwo');
    }

    public function screenthrees()
    {
        return $this->hasOne('App\Screenthree');
    }
}
