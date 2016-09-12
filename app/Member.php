<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public static function getCount()
    {
        $count = Member::where('treatement', '=', 0)->get();

        return $count->count();
    }
}
