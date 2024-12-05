@extends('layouts.main')

@section('title', 'Tableau de Bord des Transactions')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-2xl font-bold mb-6">Tableau de Bord des Transactions</h1>

    @foreach ($orders as $order)
        <div class="bg-white shadow-md rounded p-6 mb-4">
            <p><strong>Utilisateur:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
            <p><strong>Date de la transaction:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Montant total payé:</strong> €{{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Méthode de paiement:</strong> {{ $order->payment_method }}</p>
            <p><strong>Livres achetés:</strong></p>
            <ul class="list-disc list-inside">
                @foreach ($order->orderItems as $item)
                    <li>{{ $item->book->title }} - €{{ number_format($item->price, 2) }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
