<!-- SEARCH RESULTS -->

@extends('layouts.main')

@section('title', 'Résultats de la Recherche')

@section('content')
<h1>Résultats de la Recherche</h1>

@if($filteredBooks->isEmpty())
    <p>Aucun livre trouvé pour votre recherche.</p>
@else
    @foreach($filteredBooks as $book)
        <div>
            <h2>{{ $book['title'] }}</h2>
            <p>Auteur: {{ $book['author'] }}</p>
            <p>Année: {{ $book['year'] }}</p>
            <a href="{{ route('books.show', $book['id']) }}">Voir Détails</a>
        </div>
    @endforeach
@endif
@endsection