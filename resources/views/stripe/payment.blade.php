@extends('layouts.main')

@section('title', 'Stripe Payment')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-2xl font-bold mb-6">Stripe Payment</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stripe.processPayment') }}" method="POST" id="payment-form">
        @csrf

        <div class="form-group">
            <label for="amount">Amount ($)</label>
            <input type="number" name="amount" id="amount" class="border rounded p-2 w-full" value="10.00" min="0.5" step="0.01" required>
        </div>

        <div class="form-group mt-4">
            <label for="card-element">Credit or Debit Card</label>
            <div id="card-element" class="border rounded p-2"></div>
            <div id="card-errors" role="alert" class="text-red-500 mt-2"></div>
        </div>

        <button type="submit" class="mt-6 bg-accent-color text-white px-4 py-2 rounded">Pay with Stripe</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d',
            lineHeight: '24px',
            fontFamily: '"Gill Sans", sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
        },
        invalid: {
            color: '#fa6f76',
            iconColor: '#fa6f76'
        }
    };

    var card = elements.create('card', {style: style});
    card.mount('#card-element');

    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
@endsection
