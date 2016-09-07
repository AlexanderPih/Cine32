<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenthree extends Model
{
    public function types()
    {
        return $this->hasOne('App\Type');
    }
    
}
