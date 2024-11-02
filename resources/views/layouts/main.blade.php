<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title> <!-- title set in child views -->
</head>
<body>
    <header>
        <!-- nav links -->
        <a href="{{ route('books.index') }}">Accueil</a>
        <a href="{{ route('contact.index') }}">Contacter Nous</a>
        <a href="{{ route('search.index') }}">Chercher</a>
        <a href="{{ route('contact.messages') }}">Messages</a>
    </header>
    <main>
        <!-- content filled by child views -->
        @yield('content')
    </main>
</body>
</html>
