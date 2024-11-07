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
            <select name="year" id="year" required>
                <option value="" disabled selected>Choisissez une année</option>
                @foreach (range(date('Y'), 1900) as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category">Genre</label>
            <input type="text" name="category" id="category" required>
        </div>
        <div class="form-group">
            <label for="description">Résumé</label> 
            <textarea name="description" id="description" required></textarea> 
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection
