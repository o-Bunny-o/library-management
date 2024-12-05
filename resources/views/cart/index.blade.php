@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold text-center mx-8 mb-6">Mon panier</h1>

{{-- Success or Error Messages --}}
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

{{-- Check if the cart is empty --}}
@if($cartItems->isEmpty())
    <p class="text-center">Votre panier est vide.</p>
@else

    <table>
        <thead>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>
                        {{-- Update Quantity Form --}}
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 50px;">
                            <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->price, 2, ',', ' ') }} $</td>
                    <td>{{ number_format($item->quantity * $item->price, 2, ',', ' ') }} $</td>
                    <td>
                        {{-- Delete Item Form --}}
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Display subtotal and total --}}
    <div>
        <p>Sous-total : {{ number_format($subtotal, 2, ',', ' ') }} $</p>
        <p>Total : {{ number_format($total, 2, ',', ' ') }} $</p>
    </div>

    {{-- Payment Options --}}
    <h2>Choisissez votre méthode de paiement :</h2>
    <a href="{{ route('payment.payWithPayPal') }}" class="btn btn-success">Payer avec PayPal</a>

    <form id="stripe-payment-form" action="{{ route('payment.payWithStripe') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="{{ $total }}">
        <input type="hidden" id="stripePaymentMethod" name="stripePaymentMethod">
        
        <div id="card-element">
            <!-- Stripe.js Card Element will be mounted here -->
        </div>
        <button type="button" id="stripePayButton" class="btn btn-primary">Payer avec Stripe</button>
    </form>

@endif

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    // Mount the card input element
    cardElement.mount('#card-element');

    // Handle form submission
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
