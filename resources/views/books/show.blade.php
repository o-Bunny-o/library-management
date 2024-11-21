@extends('layouts.main')

@section('title', 'Détails du Livre')

@section('content')
<div class="form-container">
    <h1 class="text-3xl font-bold">{{ $book['title'] }}</h1>
    
    <p><strong>Auteur:</strong> {{ $book['author'] }}</p>
    <p><strong>Année:</strong> {{ $book['year'] }}</p>
    <p><strong>Genre:</strong> {{ $book['genre'] }}</p>
    <p><strong>Prix:</strong> $ {{ $book['price'] }} <br><br></p>
    
    <!-- Résumé complet -->
    <div id="full-summary" class="hidden mt-4 p-4 bg-gray-100 rounded-lg shadow-sm">
        <p><strong>Résumé:</strong> {{ $book['description'] }}</p>
       <p>Source : <a> https://www.supersummary.com/</a></p>
    </div>

    <!-- Bouton pour afficher ou masquer le résumé -->
    <button id="toggle-summary-btn" onclick="toggleSummary()" class="bg-blue-500 text-black py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-200 ease-in-out underline">
        Voir le Résumé
    </button>

    <br><br>

    <!-- delete button -->
    <form action="{{ route('books.destroy', $book['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition duration-200 ease-in-out">
            Supprimer le Livre
        </button>
    </form>

    <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Retour à la Liste des Livres</a>
</div>

<!-- Script JavaScript pour afficher ou masquer le résumé -->
<script>
    function toggleSummary() {
        var summaryDiv = document.getElementById("full-summary");
        var button = document.getElementById("toggle-summary-btn");

        // Si le résumé est masqué, on l'affiche et on change le texte du bouton
        if (summaryDiv.classList.contains("hidden")) {
            summaryDiv.classList.remove("hidden");
            button.innerHTML = "Voir moins"; // Change le texte du bouton
            
        } else {
            summaryDiv.classList.add("hidden");
            button.innerHTML = "Voir le Résumé"; // Réinitialise le texte du bouton
           
    }}
</script>
@endsection
