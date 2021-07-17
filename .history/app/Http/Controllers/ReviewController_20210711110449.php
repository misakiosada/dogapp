<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use APP\Category;
use APP\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Auth::user()->reviews;

        return response()->json($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(State $state, Category $category, Place $place, Request $request)
    {
        $place = new Place();
        $place->name = request('name');
        $place->address = request('address');
        $place->state = $state->id;
        $place->category = $category->id;
        $place->save();

        $review = new Review();
        $review->place = request('place');
        $review->starts = request('stars');
        $review->content = request('content');
        $review->image = request('image');
        $review->user_id = Auth::id();
        $review->save();

        $reviews = Auth::user()->reviews;

        return response()->json($reviews);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(State $state, Category $category, Place $place, Request $request, Review $review)
    {

        $place->name = request('name');
        $place->address = request('address');
        $place->state = $state->id;
        $place->category = $category->id;
        $place->save();

        $review->place = request('place');
        $review->starts = request('stars');
        $review->content = request('content');
        $review->image = request('image');
        $review->user_id = Auth::id();
        $review->save();

        $reviews = Auth::user()->reviews;

        return response()->json($reviews);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        $reviews = Auth::user()->reviews;

        return response()->json($reviews);
    }
}