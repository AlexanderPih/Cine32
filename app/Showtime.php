<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{

    public function screenone()
    {
        return $this->belongsTo('App\Screenone');
    }

    public function screentwo()
    {
        return $this->belongsTo('App\Screentwo');
    }
}
