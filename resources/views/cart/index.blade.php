@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold text-center mx-8 mb-6">Mon panier</h1>

<!-- Affichage des messages de succès ou d'erreur -->
@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<!-- Vérification du panier -->
@if($cartItems->isEmpty())
    <p>Votre panier est vide.</p>
@else
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Livre</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>
                        <!-- Formulaire pour mettre à jour la quantité -->
                        <form method="POST" action="{{ route('cart.update', $item->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99">
                            <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->price, 2, ',', ' ') }} $</td>
                    <td>{{ number_format($item->quantity * $item->price, 2, ',', ' ') }} $</td>
                    <td>
                        <!-- Formulaire pour supprimer un article -->
                        <form method="POST" action="{{ route('cart.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <!-- Résumé des totaux -->
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Sous-total :</strong></td>
                <td colspan="2">{{ number_format($subtotal, 2, ',', ' ') }} $</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>TPS (5%) :</strong></td>
                <td colspan="2">{{ number_format($tps, 2, ',', ' ') }} $</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>TVQ (9.975%) :</strong></td>
                <td colspan="2">{{ number_format($tvq, 2, ',', ' ') }} $</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total général :</strong></td>
                <td colspan="2"><strong>{{ number_format($total, 2, ',', ' ') }} $</strong></td>
            </tr>
        </tbody>
    </table>
@endif
@endsection
