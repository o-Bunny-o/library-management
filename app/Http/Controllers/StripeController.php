<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
    public function showPaymentForm()
    {
        return view('stripe.payment');
    }

    public function processPayment(Request $request)
{
    // Validate the request
    $request->validate([
        'stripeToken' => 'required',
        'amount' => 'required|numeric|min:0.5',
        'book_ids' => 'required|array', // IDs of purchased books
    ]);

    try {
        // Set your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create the charge
        $charge = Charge::create([
            'amount' => $request->input('amount') * 100, // Amount in cents
            'currency' => 'usd',
            'description' => 'Book Purchase',
            'source' => $request->input('stripeToken'),
        ]);

        // Create the Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $request->input('amount'),
            'payment_method' => 'Stripe',
            'status' => 'completed',
            'transaction_id' => $charge->id,
        ]);

        // Attach purchased books to the Order
        $bookIds = $request->input('book_ids');
        $books = Book::whereIn('id', $bookIds)->get();

        foreach ($books as $book) {
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $book->id,
                'quantity' => 1, // Adjust as needed
                'price' => $book->price,
            ]);
        }

        // Payment successful
        return redirect()->route('home')->with('success', 'Stripe Payment Successful!');
    } catch (\Exception $e) {
        // Payment failed
        return back()->withErrors('Error: ' . $e->getMessage());
    }
}

}
