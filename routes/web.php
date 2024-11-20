<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController; 
use App\Http\Controllers\UserController;


Auth::routes();


// home page / book list
Route::get('/', [BookController::class, 'index'])->name('books.index'); // route nommé books.index

// book routes

    // +book
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    // form submission
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    // book details
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    // delete book
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

    // new books display
    Route::get('/new-arrivals', [BookController::class, 'newArrivals'])->name('books.newArrivals');

// contact routes

    // contact form
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    // contact submission
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // messages from contact form
    Route::get('/messages', [ContactController::class, 'showMessages'])->name('contact.messages');

// search page & results
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// user routes

    //profile route
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    //updated profile route
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');


// auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');