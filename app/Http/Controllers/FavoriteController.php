<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index() {

        // get all fav for a user (loggedin)
        return $request->user()->favorites;
    }

    public function store(Request $request, Book $book) {

        // add book to user's fav
        $data = [
            'user_id' => $request->user()->id,
            'book_id' => $book->id,
        ];

        return Favorite::create($data);
    }

    public function destroy(Favorite $favorite) {

        // get the book name
        $bookName = $favorite->book->name;

        // delete a specified fav
        $favorite->delete();
        return response()->json([
            'message' => "{$bookName} removed successfully from your favorites!"
        ]);
    }
}

}
