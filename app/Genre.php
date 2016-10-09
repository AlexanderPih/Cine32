<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Genre extends Model
{

    /**
     * Relationship, one genre has many films
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function films()
    {
        return $this->belongsToMany('App\Film');
    }

}
