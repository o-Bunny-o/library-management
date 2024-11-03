<!-- SPECIFIC BOOK DETAILS -->
@extends('layouts.main')

@section('title', 'Détails du Livre')

@section('content')
<div class="form-container">
    <h1>{{ $book['title'] }}</h1>
    
    <p><strong>Auteur:</strong> {{ $book['author'] }}</p>
    <p><strong>Année:</strong> {{ $book['year'] }}</p>
    <p><strong>Résumé:</strong> {{ $book['summary'] }}</p>
    <p><strong>Prix:</strong> {{ $book['price'] }} €</p>

    <!-- Delete button -->
    <form action="{{ route('books.destroy', $book['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Supprimer le Livre</button>
    </form>

    <a href="{{ route('books.index') }}" class="back-link">Retour à la Liste des Livres</a>
</div>
@endsection
