@extends('layouts.main')

@section('title', 'Nouveautés')

@section('content')

    <h1 class="text-2xl font-bold text-center mb-6">Livres Récemment Ajoutés</h1>
    <div class="form-container">
    @foreach($recentBooks as $book)
        <div class="book-entry">
            <h2>{{ $book['title'] }}</h2>
            <p><strong>Auteur:</strong> {{ $book['author'] }}</p>
            <p><strong>Année:</strong> {{ $book['year'] }}</p>
            <a href="{{ route('books.show', $book['id']) }}" class="hover:underline">Voir Détails</a>
        </div>
    @endforeach
</div>
@endsection