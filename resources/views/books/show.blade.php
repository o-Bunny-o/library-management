@extends('layouts.main')

@section('title', 'Détails du Livre')

@section('content')
<div class="form-container">
    <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
    
    <p><strong>Auteur :</strong> {{ $book->author }}</p>
    <p><strong>Année :</strong> {{ $book->year }}</p>
    <p><strong>Genre :</strong> {{ $book->genre }}</p>
    <p><strong>Prix :</strong> $ {{ number_format($book->price, 2, ',', ' ') }}</p>
    <p><strong>Stock disponible :</strong> {{ $book->stock }}</p>

    <!-- Formulaire pour ajouter au panier -->
    <form action="{{ route('cart.store') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        
        <label for="quantity">Quantité :</label>
        <input id="quantity" name="quantity" type="number" value="1" min="1" max="{{ $book->stock }}" class="border rounded px-2 py-1 w-20">
        
        <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out mt-2">
            Ajouter au panier
        </button>
    </form>

    <!-- Résumé complet -->
    <div id="full-summary" class="hidden mt-4 p-4 bg-gray-100 rounded-lg shadow-sm">
        <p><strong>Résumé :</strong> {{ $book->description }}</p>
        <p>Source : <a href="https://www.supersummary.com/">https://www.supersummary.com/</a></p>
    </div>

    <!-- Bouton pour afficher ou masquer le résumé -->
    <button id="toggle-summary-btn" onclick="toggleSummary()" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out underline mt-4">
        Voir le Résumé
    </button>

    @auth
    @if(auth()->user()->isAdmin())
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition duration-200 ease-in-out">
                Supprimer le Livre
            </button>
        </form>
    @endif
@endauth


    <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Retour à la Liste des Livres</a>
</div>

<!-- Script JavaScript pour afficher ou masquer le résumé -->
<script>
    function toggleSummary() {
        var summaryDiv = document.getElementById("full-summary");
        var button = document.getElementById("toggle-summary-btn");

        if (summaryDiv.classList.contains("hidden")) {
            summaryDiv.classList.remove("hidden");
            button.innerHTML = "Voir moins";
        } else {
            summaryDiv.classList.add("hidden");
            button.innerHTML = "Voir le Résumé";
        }
    }
</script>
@endsection
