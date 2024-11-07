<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

// home page / book list
Route::get('/', [BookController::class, 'index'])->name('books.index');

// R+book
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// form submission
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// book details
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// delete book
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// new books display
Route::get('/new-arrivals', [BookController::class, 'newArrivals'])->name('books.newArrivals');

// contact form
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// contact submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// messages from contact form
Route::get('/messages', [ContactController::class, 'showMessages'])->name('contact.messages');

// search page & results
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
