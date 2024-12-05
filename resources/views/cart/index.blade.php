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

{{-- Vérification si le panier est vide --}}
@if($cartItems->isEmpty())
    <p class="text-center">Votre panier est vide.</p>
@else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">Article</th>
                    <th class="py-2 px-4 border-b text-center">Quantité</th>
                    <th class="py-2 px-4 border-b text-right">Prix</th>
                    <th class="py-2 px-4 border-b text-right">Total</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
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
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded ml-2">⟳</button>
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
    </div>

    {{-- Afficher le sous-total, les taxes et le total --}}
    <div class="mt-6 text-right">
        <p class="mb-2"><strong>Sous-total :</strong> {{ number_format($subtotal, 2, ',', ' ') }} $</p>
        {{-- Calculer les taxes --}}
        @php
            $taxRate = 0.15; // Par exemple, 15% de taxes
            $taxes = $subtotal * $taxRate;
            $grandTotal = $subtotal + $taxes;
        @endphp
        <p class="mb-2"><strong>Taxes (15%) :</strong> {{ number_format($taxes, 2, ',', ' ') }} $</p>
        <p class="text-xl font-bold"><strong>Total :</strong> {{ number_format($grandTotal, 2, ',', ' ') }} $</p>
    </div>

    {{-- Boutons de paiement --}}
    <div class="mt-6 flex justify-end">
        <a href="{{ route('payment.payWithPayPal') }}" class="bg-blue-600 hover:bg-accent-color hover:text-white text-white font-bold py-2 px-4 rounded mr-2">Payer avec PayPal</a>
        <a href="{{ route('payment.payWithStripe') }}" class="bg-greeny hover:bg-accent-color hover:text-white text-white font-bold py-2 px-4 rounded">Payer avec Stripe</a>
    </div>
@endif
@endsection
