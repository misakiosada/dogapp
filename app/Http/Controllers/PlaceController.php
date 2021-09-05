<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\State;
use App\Category;
use App\Review;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{

    public function index(Review $review)
    {
        return Place::all();
    }


}
