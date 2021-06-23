<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function states()
    {
        return $this->belongsTo('App\State');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
}
