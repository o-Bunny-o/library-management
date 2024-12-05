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
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\OrderController;


Auth::routes();

//testing a real home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//  book list
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Book routes
Route::middleware(['auth'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Book details
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/new-arrivals', [BookController::class, 'newArrivals'])->name('books.newArrivals');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/messages', [ContactController::class, 'showMessages'])->name('contact.messages');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// User routes
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

// Admin-specific routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'manageUsers'])->name('admin.users');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Cart routes
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier', [CartController::class, 'store'])->name('cart.store');
Route::put('/panier/{item}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/panier/{item}', [CartController::class, 'destroy'])->name('cart.destroy');

// stripe

Route::get('/stripe/payment', [StripeController::class, 'showPaymentForm'])->name('stripe.payment');
Route::post('/stripe/process-payment', [StripeController::class, 'processPayment'])->name('stripe.processPayment');

// orders
Route::get('/purchase-history', [OrderController::class, 'userPurchaseHistory'])->name('purchase.history')->middleware('auth');
