<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {

        // get all reviews for a book
        return $book->reviews;
    }

    public function store(Request $request, Book $book) {

        // validate & create new review for a book
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string', // not mandatory
        ]);

        $data['book_id'] = $book->id;
        return Review::create($data);
    }

    public function destroy(Review $review)
    {
        // delete a review
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
