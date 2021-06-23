<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function places()
    {
        return $this->hasMany('App\Place');
    }
}
