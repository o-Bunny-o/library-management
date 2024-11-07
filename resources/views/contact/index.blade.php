@extends('layouts.main')

@section('title', 'Contacter Nous')

@section('content')

<h1 class="text-2xl font-bold text-center mb-6">Informations de Contact</h1>

<div class="contact-container">
    <!-- Section d'informations de contact (adresse et description) -->
    <div class="contact-info">
        <p><strong>Bibliothèque de Montréal - La Fleur Des Livres<br><br></strong></p>
        <p><strong>Adresse :</strong> 345 Boulevard Saint-Laurent, Montréal, QC H2X 2V5, Canada</p>
        <p><strong>Email :</strong> <a href="mailto:info@lafleurdeslivres.ca">info@lafleurdeslivres.ca</a></p>
        <p><strong>Téléphone :</strong> +1 514-123-4567<br><br></p>
        
        <p><strong>À propos :<br><br></strong></p>
        <p>Notre bibliothèque offre une large sélection de livres, de ressources en ligne et d'événements communautaires pour les lecteurs de tous âges. Que vous soyez passionné par la littérature classique, à la recherche de nouvelles connaissances, ou intéressé par nos activités culturelles, nous avons quelque chose pour vous !<br><br></p>

        <p><strong>Horaires d'ouverture :<br><br></strong></p>
        <ul>
            <li><strong>Lundi à vendredi :</strong> 10h00 - 18h00</li>
            <li><strong>Samedi :</strong> 11h00 - 17h00</li>
            <li><strong>Dimanche :</strong> Fermé</li>
        </ul>
    </div>

    <!-- Formulaire de contact -->
    <div class="form-container">
        <h2>Formulaire de Contact</h1>
        
        <!-- Afficher un message de succès si disponible -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
@endsection
