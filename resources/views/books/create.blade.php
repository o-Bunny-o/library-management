@extends('layouts.main')

@section('title', 'Ajouter un Livre')

@section('content')
<div class="form-container">
    <h1>Ajouter un Livre</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" required>
        </div>
        <div class="form-group">
            <label for="year">Année de publication</label>
            <input type="number" name="year" id="year" required>
        </div>
        <div class="form-group">
            <label for="description">Résumé</label> <!-- Changez summary en description -->
            <textarea name="description" id="description" required></textarea> <!-- Changez summary en description -->
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection
