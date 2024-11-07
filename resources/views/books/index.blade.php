
@extends('layouts.main')

@section('title', 'Liste des Livres')

@section('content')

<h1 class="text-2xl font-bold text-center mb-6">Liste des Livres</h1>

<!-- search -->
<form action="{{ route('search.index') }}" method="GET" class="search-form mb-6">
    <input 
        type="text" 
        name="query" 
        placeholder="Rechercher par titre, auteur ou année" 
        class="border border-gray-300 p-2 rounded-l-md focus:outline-none focus:border-accent"
    >
    <button type="submit" class="bg-accent text-white px-4 py-2 rounded-r-md">
        Chercher
    </button>
</form>

<!-- +book -->
<a href="{{ route('books.create') }}" class="text-accent hover:underline mb-6 inline-block font-semibold">
    Ajouter un livre
</a>

<!-- list -->
@foreach($books as $book)
    <div class="book-entry">
        <h2>{{ $book['title'] }}</h2>
        <p>Auteur: {{ $book['author'] }}</p>
        <p>Année: {{ $book['year'] }}</p>
        <p>Prix: {{ $book['price'] }} $</p>
        <p>Résumé: {{ $book['description'] }}</p>
        <form action="{{ route('books.show', $book['id']) }}" method="GET" class="inline">
        <button type="submit" class="button-with-border">
        Voir Détails
</button> 
        </form>
    </div>
@endforeach
@endsection
