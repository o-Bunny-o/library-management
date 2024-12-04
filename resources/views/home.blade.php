@extends('layouts.main')

@section('content')
<div class="container mx-auto my-8 px-4">
    <!-- About Us Section -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">À Propos de Nous</h2>
        <p class="text-lg">
            Bienvenue à La Fleur des Livres ! Nous sommes une équipe passionnée dédiée à vous offrir la meilleure sélection de livres à travers divers genres.
        </p>
    </div>

    <!-- Swiper Carousel -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($books as $book)
                <div class="swiper-slide">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <!-- Book Image -->
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover">
                        <!-- Book Details -->
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
                            <p class="text-gray-600">{{ Str::limit($book->description, 100) }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded">Voir Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
@endsection
