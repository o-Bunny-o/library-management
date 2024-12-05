@extends('layouts.main')

@section('content')
<h1>Paiement réussi</h1>
<p>Merci pour votre achat !</p>

<h1>Détails de la transaction</h1>

<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactionDetails['items'] as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['price'], 2, ',', ' ') }} {{ $transactionDetails['currency'] }}</td>
            <td>{{ number_format($item['quantity'] * $item['price'], 2, ',', ' ') }} {{ $transactionDetails['currency'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    <p><strong>Transaction ID :</strong> {{ $transactionDetails['id'] }}</p>
    <p><strong>Total :</strong> {{ number_format($transactionDetails['total'], 2, ',', ' ') }} {{ $transactionDetails['currency'] }}</p>
    <p><strong>Email du Payer :</strong> {{ $transactionDetails['payer_email'] }}</p>
</div>
@endsection
