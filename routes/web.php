<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

// home page / book list
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// R+book
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// form submission
Route::post('/books', [BookController::class, 'store'])->name('books.store');


