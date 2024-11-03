<!-- SEND A MESSAGE SECTION -->

@extends('layouts.main')

@section('title', 'Contacter Nous')

@section('content')
<h1>Formulaire de Contact</h1>

<forn action="{{ route('contact.store) }}" method="POST">
    @csrf 
    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>

    <button type="submit">Envoyer</button>
</form>

<!-- contact info -->
<h2>Informations de la Bibliothèque</h2>
<p>Adresse: 1234 Avenue des Livres, Livreville</p>
<p>Téléphone: +1 514 567 8910</p>
<p>Email: contact@bibliotheque.com</p>
@endsection