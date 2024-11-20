@extends('layouts.main')

@section('title', 'Mon Profil')

@section('content')

<h1 class="text-2xl font-bold text-center mb-6">Informations de Profil</h1>

<div class="profile-container">
    <!-- Section d'informations de profil (nom, email, etc.) -->
    <div class="profile-info">
        <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
        
        <p><strong>À propos de moi :</strong></p>
        <p>Bienvenue sur votre page de profil. Ici, vous pouvez voir vos informations personnelles et les mettre à jour si nécessaire.</p>

        <p><strong>Inscrit le :</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
    </div>

    <!-- Formulaire de mise à jour du profil -->
    <div class="form-container">
        <h2>Mettre à Jour le Profil</h2>

        <!-- Success message if available -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="about">À propos de moi</label>
                <textarea name="about" id="about" placeholder="Ajoutez quelques informations sur vous...">{{ Auth::user()->about ?? '' }}</textarea>
            </div>
            <button type="submit">Mettre à Jour</button>
        </form>
    </div>
</div>

@endsection
