<!-- NEW BOOKS -->

@extends('layouts.main')

@section('title', 'Nouveautés')

@section('content')
<div class="form-container">
    <h1>Livres Récemment Ajoutés</h1>
    @foreach($recentBooks as $book)
        <div class="book">
            <h2>{{ $book['title'] }}</h2>
            <p><strong>Auteur:</strong> {{ $book['author'] }}</p>
            <p><strong>Année:</strong> {{ $book['year'] }}</p>
            <a href="{{ route('books.show', $book['id']) }}" class="view-details-link">Voir Détails</a>
            <hr>
        </div>
    @endforeach
</div>
@endsection
