<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Make sure to import your Book model

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the latest 5 books
        $books = Book::latest()->take(5)->get();
        return view('home', compact('books'));
    }
}
