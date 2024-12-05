@extends('layouts.main')

@section('title', 'Contacter Nous')

@section('content')

<h1 class="text-2xl font-bold text-center mb-6">Informations de Contact</h1>

<div class="contact-container">
    <!-- Section d'informations de contact (adresse et description) -->
    <div class="contact-info">
        <p><strong>Bibliothèque de Montréal - La Fleur Des Livres<br><br></strong></p>
        <p><strong>Adresse :</strong> 345 Boulevard Saint-Laurent, Montréal, QC H2X 2V5, Canada</p>
        <!-- Google Maps Embed -->
        <div class="mt-10 py-4  md:mt-0 md:w-1/2 rounded">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.850970645908!2d-73.56725308450533!3d45.50888877910306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a7a18b70df7%3A0x5d4f1f3c7f4c4a4b!2s345%20Boulevard%20Saint-Laurent%2C%20Montr%C3%A9al%2C%20QC%20H2X%202V5%2C%20Canada!5e0!3m2!1sen!2sus!4v1691283210123!5m2!1sen!2sus" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        <p class="pt-4"><strong>Email :</strong> <a href="mailto:info@lafleurdeslivres.ca">info@lafleurdeslivres.ca</a></p>
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

    <!-- contact form -->
    <div class="form-container">
        <h2>Formulaire de Contact</h1>
        
        <!-- ok message if available -->
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
