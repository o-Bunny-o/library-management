<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Link to the custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Header Section with Navigation Links -->
    <header>
        <a href="{{ route('books.index') }}">Accueil</a>
        <a href="{{ route('contact.index') }}">Contacter Nous</a>
        <a href="{{ route('search.index') }}">Chercher</a>
        <a href="{{ route('contact.messages') }}">Messages</a>
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
