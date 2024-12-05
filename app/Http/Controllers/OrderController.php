<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display the purchase history for the authenticated user.
     */
    public function userPurchaseHistory()
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        // Retrieve the user's orders with related order items and books
        $orders = $user->orders()->with('orderItems.book')->get();

        return view('orders.history', compact('orders'));
    }

    /**
     * Display all transactions for administrators.
     */
    public function adminTransactions()
    {
        // Retrieve all orders with related user and order items
        $orders = Order::with('user', 'orderItems.book')->orderBy('created_at', 'desc')->get();

        return view('admin.transactions', compact('orders'));
    }
}
