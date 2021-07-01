<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}