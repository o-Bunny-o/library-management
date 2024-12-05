<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\CartItem;
use App\Models\Book;
use App\Models\Payment;

class PaymentController extends Controller
{
    private $paypalGateway;

    public function __construct()
    {
        // Initialisation de PayPal
        $this->paypalGateway = Omnipay::create('PayPal_Rest');
        $this->paypalGateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->paypalGateway->setSecret(env('PAYPAL_SECRET'));
        $this->paypalGateway->setTestMode(true); // TRUE pour Sandbox, FALSE en production
    }

    public function success(Request $request)
    {
        $userId = auth()->id(); // ID de l'utilisateur connecté
        $cartItems = CartItem::where('user_id', $userId)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->withErrors('Votre panier est déjà vide.');
        }
    
        // Calcul du montant total
        $totalAmount = $cartItems->sum(fn ($item) => $item->quantity * $item->price);
        $currency = env('PAYPAL_CURRENCY', 'USD'); // Devise utilisée
    
        // Ajouter l'entrée dans la table `payments`
        $payment = Payment::create([
            'payment_id' => $request->input('paymentId') ?? 'stripe_' . uniqid(),
            'payer_id' => $request->input('PayerID') ?? $userId,
            'payer_email' => auth()->user()->email ?? null,
            'amount' => $totalAmount,
            'currency' => $currency,
            'payment_status' => 'approved',
        ]);
    
        // Mise à jour du stock des livres
        foreach ($cartItems as $cartItem) {
            $book = Book::find($cartItem->book_id);
            if ($book) {
                $book->stock -= $cartItem->quantity;
                $book->save();
            }
        }
    
        // Vider le panier
        CartItem::where('user_id', $userId)->delete();
    
        // Redirection vers la page de succès
        return redirect()->route('payment.success')->with('transactionDetails', $payment);
    }
    

    public function error()
    {
        return view('payment_error', ['message' => 'Le paiement a été annulé.']);
    }

    public function payWithStripe(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:0.01']);
        
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $cartItems = $this->getCartItems();
            $totalAmount = intval(round($cartItems->sum(fn ($item) => $item->quantity * $item->price) * 100));

            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmount,
                'currency' => env('STRIPE_CURRENCY', 'usd'),
                'description' => 'Stripe Payment',
                'automatic_payment_methods' => ['enabled' => true],
            ]);

            // Simulation de transaction pour Stripe
            $this->success($request);

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            return back()->withErrors('Erreur Stripe : ' . $e->getMessage());
        }
    }

    private function getCartItems()
    {
        return CartItem::where('user_id', auth()->id())->get();
    }
}
