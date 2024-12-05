<?php
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\{
    BookController,
    CategoryController,
    ReviewController,
    FavoriteController,
    ContactController,
    SearchController,
    UserController,
    CartController,
    HomeController,
    PaymentController,
    OrderController,

};
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    ForgotPasswordController,
    ResetPasswordController
};


// Authentication routes
Auth::routes();


// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
 
// Book routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/new-arrivals', [BookController::class, 'newArrivals'])->name('books.newArrivals');
 
// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});
 
// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/messages', [ContactController::class, 'showMessages'])->middleware('auth')->name('contact.messages');
 
// Search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
 
// User Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
});
 
// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'manageUsers'])->name('admin.users');
});
 
// Cart routes
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier', [CartController::class, 'store'])->name('cart.store');
Route::put('/panier/{item}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/panier/{item}', [CartController::class, 'destroy'])->name('cart.destroy');



 

// Payment routes for PayPal
Route::get('/pay', [PaymentController::class, 'payWithPayPal'])->name('payment.payWithPayPal');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-error', [PaymentController::class, 'error'])->name('payment.error');


// Payment routes for Stripe
Route::post('/stripe/pay', [PaymentController::class, 'payWithStripe'])->name('payment.payWithStripe');

// Orders 
Route::get('/purchase-history', [OrderController::class, 'userPurchaseHistory'])->name('purchase.history')->middleware('auth');
Route::get('/admin/transactions', [OrderController::class, 'adminTransactions'])->name('admin.transactions')->middleware('auth', 'isAdmin');


 
