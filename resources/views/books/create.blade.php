<!-- BOOKS DETAILS -->

@extends('layouts.main')

@section('title', 'Ajouter un Livre')

@section('content')
<h1>Ajouter un Livre</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    
    <label for="title">Titre:</label>
    <input type="text" name="title" id="title" required>

    <label for="author">Auteur:</label>
    <input type="text" name="author" id="author" required>

    <label for="year">Année de publication:</label>
    <input type="number" name="year" id="year" required>

    <label for="summary">Résumé:</label>
    <textarea name="summary" id="summary" required></textarea>

    <label for="price">Prix:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <button type="submit">Enregistrer</button>
</form>
@endsection
