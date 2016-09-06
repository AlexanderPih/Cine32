<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showtimestest extends Model
{
    protected $table = 'showtimestest';

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
