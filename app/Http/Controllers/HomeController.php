<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Make sure to include the Book model

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all(); // Fetch books to display in the carousel
        return view('home', compact('books'));
    }
}
