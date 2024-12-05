@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold text-center mx-8 mb-6">Mon panier</h1>

{{-- Messages de succès ou d'erreur --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{{-- Vérifier si le panier est vide --}}
@if($cartItems->isEmpty())
    <p class="text-center">Votre panier est vide.</p>
@else

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Article</th>
                <th class="py-2 px-4 border-b">Quantité</th>
                <th class="py-2 px-4 border-b">Prix</th>
                <th class="py-2 px-4 border-b">Total</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Parcourir les articles du panier --}}
            @foreach($cartItems as $item)
                <tr>
                    <td class="py-2 px-4 border-b">
                        {{ $item->book->title }}
                    </td>
                    <td class="py-2 px-4 border-b text-center">
                        {{-- Formulaire pour mettre à jour la quantité --}}
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-center">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="border rounded w-16 text-center">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded ml-2">⟳</button>
                        </form>
                    </td>
                    <td class="py-2 px-4 border-b text-right">
                        {{ number_format($item->price, 2, ',', ' ') }} $
                    </td>
                    <td class="py-2 px-4 border-b text-right">
                        {{ number_format($item->quantity * $item->price, 2, ',', ' ') }} $
                    </td>
                    <td class="py-2 px-4 border-b text-center">
                        {{-- Formulaire pour supprimer un article --}}
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">🗑</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Options de paiement --}}
    <h2 class="mt-6">Choisissez votre méthode de paiement :</h2>
    <a href="{{ route('payment.payWithPayPal') }}" class="btn btn-success mt-2">Payer avec PayPal</a>

    <form id="stripe-payment-form" action="{{ route('payment.payWithStripe') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="amount" value="{{ $total }}">
        <input type="hidden" id="stripePaymentMethod" name="stripePaymentMethod">
        
        <div id="card-element" class="my-4">
            <!-- Stripe.js Card Element sera monté ici -->
        </div>
        <button type="button" id="stripePayButton" class="btn btn-primary">Payer avec Stripe</button>
    </form>

@endif

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    // Monter l'élément de carte
    cardElement.mount('#card-element');

    // Gérer la soumission du formulaire
    document.getElementById('stripePayButton').addEventListener('click', async function () {
        const { error, paymentMethod } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });

        if (error) {
            alert(error.message);
        } else {
            document.getElementById('stripePaymentMethod').value = paymentMethod.id;
            document.getElementById('stripe-payment-form').submit();
        }
    });
</script>
@endsection
