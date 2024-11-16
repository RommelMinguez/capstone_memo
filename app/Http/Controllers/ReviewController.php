<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store() {
        // dd(request()->all());

        $validatedAttr = request()->validate([
            'rating' => 'integer|required',
            'comment' => 'required',
            'cake_id' => 'required',
        ]);

        Auth::user()->reviews()->create($validatedAttr);

        return redirect()->back()->with('success', 'Review Posted Successfully.');
    }

    public function update(Review $review) {
        // dd(request()->all());

        $validatedAttr = request()->validate([
            'rating' => 'integer|required',
            'comment' => 'required',
        ]);
        $validatedAttr['user_id'] = Auth::user()->id;

        $review->update($validatedAttr);

        return redirect()->back()->with('success', 'Review Updated Successfully.');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}


public function getAboutPageReviews()
{
    $reviews = Review::with('user')
                    ->where('rating', '>=', 4)
                    ->latest()
                    ->take(5)
                    ->get();
                    
    return view('about', compact('reviews'));
}



}
