<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>LA FLEUR DES LIVRES</title>
    
    <!-- Link to the custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Header Section with Navigation Links -->
    <header>
    <a href="{{ route('books.index') }}">ACCUEIL</a>
    <a href="{{ route('books.newArrivals') }}">NOUVEAUX LIVRES</a>
    
    <!-- Centered Logo Link -->
    <a href="/" class="logo-container">
        <img src="{{ asset('images/center.svg') }}" alt="Logo" class="logo">
    </a>
    
    <a href="{{ route('contact.index') }}">CONTACT</a>
    <a href="{{ route('contact.messages') }}">MESSAGES</a>
    <a href="{{ route('search.index') }}" title="Chercher">
        <i class="fas fa-search"></i>
    </a>
</header>


    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Bibliothèque La Fleur des livres | Tous droits réservés</p>
    </footer>
</body>
</html>
