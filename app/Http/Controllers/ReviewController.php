<?php

namespace App\Http\Controllers;

use App\Models\Review;
use \Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect(route(name: 'login'));
        }

        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->title = $request['review-title'];
        $review->description = $request['review-summary'];
        $review->rating = 0;
        $review->review_rating = 0;
        $review->creator_id = Auth::user()->id;
        $review->movie_id = $request['movie-id'];

        $review->save();

        return redirect(route('reviews.show', $review));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('reviews.view', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->title = $request['review-title'];
        $review->description = $request['review-summary'];

        $review->save();

        return redirect(route('reviews.show', $review));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        foreach ($review->comments as $comment) {
            $comment->delete();
        }

        $review->delete();

        return redirect(route('reviews.index'));
    }
}
