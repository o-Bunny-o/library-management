<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>LA FLEUR DES LIVRES</title>
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
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
                <a href="{{ route('home') }}" title="Bienvenu(e)!">ACCUEIL</a>
                <a href="{{ route('books.index') }}" title="Voir la liste des livres">LIVRES</a>
                <a href="{{ route('books.newArrivals') }}" title="Voir nos nouveautés">NOUVEAUTÉS</a>
            </nav>

            <!-- logo -->
            <a href="/" class="logo-container">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
            </a>

            <!-- right nav -->
            <nav class="nav-links hidden lg:flex">
                <a href="{{ route('contact.index') }}" title="Contactez-nous">
                    <i class="fas fa-phone"></i>
                </a>
                @auth
                    <a href="{{ route('contact.messages') }}" title="Voir les messages">
                        <i class="fas fa-envelope"></i>
                    </a>
                @endauth
                <a href="{{ route('search.index') }}" title="Chercher">
                    <i class="fas fa-search"></i>
                </a>
                <a href="{{ route('cart.index') }}" title="Panier">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <!-- auth links -->
                @if (Auth::check())
                <a href="{{ route('profile') }}" title="Profile">
                <i class="fas fa-user"></i>
                </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-button" title="Déconnexion">
                        LOGOUT
                    </a>
                    <!-- logout form (hidden) -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" title="Connexion">LOGIN</a>
                    <a href="{{ route('register') }}" title="S'inscrire">SIGNUP</a>
                @endif
            </nav>

            <!-- mobile nav -->
            <nav id="mobileNav" class="mobile-nav hidden">
                <a href="{{ route('home') }}">ACCUEIL</a>
                <a href="{{ route('books.index') }}">LIVRES</a>
                <a href="{{ route('books.newArrivals') }}">NOUVEAUTÉS</a>
                <a href="{{ route('contact.index') }}">CONTACT</a>

                @auth
                    <a href="{{ route('contact.messages') }}">MESSAGES</a>                    </a>
                @endauth
                <a href="{{ route('search.index') }}" title="Chercher">
                CHERCHER
                </a>
                <a href="{{ route('cart.index') }}" title="Panier">
                PANIER
                </a>
                <!-- auth links -->
                @if (Auth::check())
                <a href="{{ route('profile') }}" title="Profile">
                {{ Auth::user()->name }}
                </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="logout-button">
                        LOGOUT
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" title="Se connecter">LOGIN</a>
                    <a href="{{ route('register') }}" title="S'inscrire">SIGNUP</a>
                @endif
            </nav>
        </div>
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
