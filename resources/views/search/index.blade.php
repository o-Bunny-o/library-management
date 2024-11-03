<!-- SEARCH RESULTS -->
 
@extends('layouts.main')

@section('title', 'Rechercher un Livre')

@section('content')
<div class="form-container">
    <h1>Rechercher un Livre</h1>
    <form action="{{ route('search.index') }}" method="GET">
        <div class="form-group">
            <label for="query">Rechercher par titre, auteur ou année</label>
            <input type="text" name="query" id="query" placeholder="Titre, auteur ou année">
        </div>
        <button type="submit">Chercher</button>
    </form>
</div>
@endsection
