<!-- SEND A MESSAGE SECTION -->
 
@extends('layouts.main')

@section('title', 'Contacter Nous')

@section('content')
<div class="form-container">
    <h1>Formulaire de Contact</h1>
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
@endsection
