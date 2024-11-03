<!-- NEW BOOKS -->

@extends('layouts.main')

@section('title', 'Nouveautés')

@section('content')
<h1>Livres Récemment Ajoutés</h1>

<!-- list of recent books -->
 @foreach($recentBooks as $book)
    <div>
        <h2>{{ $book['title'] }}</h2>
        <p>Auteur: {{ $book['author'] }}</p>
        <p>Année: {{ $book['year'] }}</p>
        <a href="{{ route('books.show', $book['id']) }}">Voir Détails</a>
    </div>
@endforeach
@endsection        