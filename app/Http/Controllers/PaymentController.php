<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); // Passez à false en production
    }

    public function pay(Request $request)
    {
        $items = [];
        $subtotal = 0;

        // Exemple : Supposons que vous récupérez les articles du panier
        $cartItems = $this->getCartItems(); // Remplacez cette méthode selon vos besoins

        foreach ($cartItems as $cartItem) {
            $items[] = [
                'name' => $cartItem->name,
                'price' => number_format($cartItem->price, 2, '.', ''),
                'quantity' => $cartItem->quantity,
            ];
            $subtotal += $cartItem->price * $cartItem->quantity;
        }

        try {
            // Préparez la requête PayPal
            $response = $this->gateway->purchase([
                'amount' => number_format($subtotal, 2, '.', ''),
                'currency' => env('PAYPAL_CURRENCY', 'USD'),
                'items' => $items,
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.error'),
            ])->send();

            if ($response->isRedirect()) {
                // Redirigez l'utilisateur vers PayPal
                return $response->redirect();
            } else {
                // Gérer les erreurs
                \Log::error('Erreur PayPal : ' . $response->getMessage());
                return back()->withErrors('Erreur PayPal : ' . $response->getMessage());
            }
        } catch (\Exception $e) {
            \Log::error('Exception PayPal : ' . $e->getMessage());
            return back()->withErrors('Erreur PayPal : ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            try {
                $response = $this->gateway->completePurchase([
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId'),
                ])->send();

                $data = $response->getData();

                if (isset($data['state']) && $data['state'] === 'approved') {
                    return view('payment_success', ['transactionId' => $data['id']]);
                } else {
                    return back()->withErrors('Paiement non approuvé.');
                }
            } catch (\Exception $e) {
                \Log::error('Erreur PayPal (success) : ' . $e->getMessage());
                return back()->withErrors('Erreur PayPal : ' . $e->getMessage());
            }
        } else {
            return back()->withErrors('Paramètres de paiement manquants.');
        }
    }

    public function error()
    {
        return view('payment_error', ['message' => 'Utilisateur a annulé le paiement.']);
    }

    private function getCartItems()
    {
        // Simulation des articles du panier. Adaptez ceci à votre logique réelle.
        return [
            (object)['name' => 'Daring Greatly', 'quantity' => 2, 'price' => 19.99],
        ];
    }
}
