<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function places()
    {
        return $this->belongsTo('App\Place');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
