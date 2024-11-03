<!-- LIST OF BOOKS DISPLAY -->

@extends('layouts.main')

@section('title', 'Liste des Livres')

@section('content')

<h1>Liste des Livres</h1>

<!-- search form -->

<form action="{{ route('search.index') }}" method="Get">
    <input type="text" name="query" placeholder="Rechercher par titre, auteur ou année">
    <button type="submit">Chercher</button>
</form>

<!-- + new book -->

<a href="{{ route('books.create') }}">Ajouter un livre</a>

<!-- books list --> 
 @foreach($books as $book)
    <div>
        <h2>{{ $book['title'] }}</h2>
        <p>Auteur: {{ $book['author'] }}</p>
        <p>Année: {{ $book['year'] }}</p>
        <a href="{{ route('books.show', $book['id']) }}">Voir Détails</a>
    </div>
@endforeach
@endsection