<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>LA FLEUR DES LIVRES</title>
    @vite('resources/css/styles.css')
</head>
<body>
    <header>
        <div class="header-content">
            <!-- burger menu - mobile -->
            <button id="burgerMenu" class="burger-menu hidden lg:hidden" aria-label="Toggle menu">
                <i class="fas fa-bars"></i> <!-- burger icon -->
            </button>

            <!-- left nav -->
            <nav class="nav-links hidden lg:flex">
                <a href="{{ route('books.index') }}">ACCUEIL</a>
                <a href="{{ route('books.newArrivals') }}">NOUVEAUX LIVRES</a>
            </nav>

            <!-- logo -->
            <a href="/" class="logo-container">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
            </a>

            <!-- right nav -->
            <nav class="nav-links hidden lg:flex">
                <a href="{{ route('contact.index') }}">CONTACT</a>
                <a href="{{ route('contact.messages') }}">MESSAGES</a>
                <a href="{{ route('search.index') }}" title="Chercher">
                    <i class="fas fa-search"></i>
                </a>
            </nav>
        </div>

        <!-- mobile nav -->
        <nav id="mobileNav" class="mobile-nav hidden">
            <a href="{{ route('books.index') }}">ACCUEIL</a>
            <a href="{{ route('books.newArrivals') }}">NOUVEAUX LIVRES</a>
            <a href="{{ route('contact.index') }}">CONTACT</a>
            <a href="{{ route('contact.messages') }}">MESSAGES</a>
            <a href="{{ route('search.index') }}" title="Chercher">
                <i class="fas fa-search"></i>
            </a>
        </nav>
    </header>

    <!-- main content -->
    <main>
        @yield('content')
    </main>

    <!-- footer -->
    <footer>
        <p>&copy; 2024 Bibliothèque LA FLEUR DES LIVRES | Tous droits réservés</p>
    </footer>
    
    <!-- burger menu script -->

    <script>
    document.getElementById('burgerMenu').addEventListener('click', function() {
        const mobileNav = document.getElementById('mobileNav');
        mobileNav.classList.toggle('active');
    });
</script>

</body>
</html>
