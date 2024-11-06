@extends('layouts.main')

@section('title', 'Recherche de Livres')

@section('content')
<div class="form-container">
    <h1>Rechercher un Livre</h1>
    <form action="{{ route('search.index') }}" method="GET">
        <div class="form-group">
            <label for="query">Rechercher par titre, auteur ou année</label>
            <input type="text" name="query" id="query" placeholder="Titre, auteur ou année" value="{{ request('query') }}">
        </div>
        <button type="submit">Chercher</button>
    </form>

    <h2>Résultats de la Recherche</h2>
    @if(count($books) === 0) 
        <p>Aucun livre trouvé.</p>
    @else
        <div class="results">
            @foreach($books as $book)
                <div class="book">
                    <h3>{{ $book['title'] }}</h3> 
                    <p><strong>Auteur :</strong> {{ $book['author'] }}</p> 
                    <p><strong>Année de publication :</strong> {{ $book['year'] }}</p> 
                    <a href="{{ route('books.show', $book['id']) }}">Voir Détails</a>
                    <hr>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
