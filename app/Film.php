<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    public function directors()
    {
        return $this->belongsToMany('App\Director');
    }
    
    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function classification()
    {
        return $this->belongsTo('App\Classification');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function cinemas()
    {
        return $this->belongsToMany('App\Cinema');
    }

    /**
     * Get the cinema id from slug
     * @param $slug
     * @return mixed
     */
    public static function getCinemaId($slug)
    {
        $cinema_Id = Cinema::where('slug', '=', $slug)->select('id')->get();
        return $cinema_Id[0]->id;
    }
}
