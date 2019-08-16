<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
