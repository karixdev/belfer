<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
