<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use App\State;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reviews = Review::with(['place', 'place.state', 'place.category'])->get();

        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(State $state, Category $category, Request $request)
    {

        try {

        DB::beginTransaction();

        $place = new Place();
        $place->name = request('placeName');
        $place->address = request('placeAddress');
        $place->state_id = $request->input('stateId');
        $place->category_id = $request->input('categoryId');
        $place->save();

        $review = new Review();
        $review->place_id = $place->id;
        $review->stars = request('star');
        $review->content = request('content');
        $review->image = request('image');
        $review->user_id = Auth::id();
        $review->save();

        DB::commit();
        } catch (\Throwable $e) {
        DB::rollBack();
        logger($e);
        }

        $reviews = Review::with(['place', 'place.state', 'place.category'])->get();
        return response()->json($reviews);
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

        $review->content = request('content');
        $review->user_id = Auth::id();
        $review->save();

        $reviews = Review::with(['place', 'place.state', 'place.category'])->get();
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

        $reviews = Review::with(['place', 'place.state', 'place.category'])->get();

        return response()->json($reviews);
    }
}
