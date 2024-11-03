<!-- SPECIFIC BOOK DETAILS -->

@extends('layouts.main')

@section('title', 'Détails du Livre')

@section('content')
<h1>{{ $book['title'] }}</h1>

<p><b>Auteur:</b> {{ $book['author'] }}</p>
<p><b>Année:</b> {{ $book['year'] }}</p>
<p><b>Résumé:</b> {{ $book['summary'] }}</p>
<p><b>Prix:</b> {{ $book['price'] }} €</p>

<!-- delete button -->

<form action="{{ route('books.destroy', $book['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer le Livre</button>
</form>

<a href="{{ route('books.index') }}">Retour à la Liste des Livres</a>
@endsection
