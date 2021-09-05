<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'id');

    }

    public function state()
    {
        return $this->belongsTo('App\State', 'id');
    }

}
