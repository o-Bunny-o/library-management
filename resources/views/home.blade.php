<!-- resources/views/home.blade.php -->

@extends('layouts.main')

@section('content')

<h1 class="text-2xl font-bold text-center mb-6">À Propos de Nous</h1>
<p class="text-md px-10 pb-10">
    Bienvenue à La Fleur des Livres ! Nous sommes une équipe passionnée dédiée à vous offrir la meilleure sélection de livres à travers divers genres.
</p>

<!-- Swiper Carousel -->
<div class="max-w-7xl mx-8 px-4 overflow-hidden">
    <div class="swiper-container h-auto">
        <div class="swiper-wrapper pb-16 text-accent-color">
            @foreach($books as $book)
                <div class="swiper-slide h-auto">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <!-- Book Details -->
                        <div class="p-4 h-60 flex flex-col justify-between">
                            <h3 class="text-xl font-semibold mb-2 book-title">{{ $book->title }}</h3>
                            <p class="text-gray-600 book-description">{{ Str::limit($book->description, 50) }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="mt-2 inline-block bg-accent-color text-white px-4 py-2 rounded book-button">Voir Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination mt-10"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

@endsection
