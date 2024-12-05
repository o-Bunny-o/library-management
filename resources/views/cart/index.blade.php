@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold text-center mx-8 mb-6">Mon panier</h1>

{{-- Messages de succès ou d'erreur --}}
@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div style="color: red;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{{-- Vérification si le panier est vide --}}
@if($cartItems->isEmpty())
    <p>Votre panier est vide.</p>
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
            {{-- Parcourir les articles du panier --}}
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2, ',', ' ') }} $</td>
                    <td>{{ number_format($item->quantity * $item->price, 2, ',', ' ') }} $</td>
                    <td>
                        {{-- Formulaire pour mettre à jour la quantité --}}
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                            <button type="submit">Mettre à jour</button>
                        </form>

                        {{-- Formulaire pour supprimer un article --}}
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Afficher le sous-total et le total --}}
    <div>
        <p>Sous-total : {{ number_format($subtotal, 2, ',', ' ') }} $</p>
        <p>Total : {{ number_format($total, 2, ',', ' ') }} $</p>
    </div>

    {{-- Bouton de paiement avec PayPal --}}
    <a href="{{ route('payment.pay') }}" class="btn btn-success">Payer avec PayPal</a>
@endif
@endsection
