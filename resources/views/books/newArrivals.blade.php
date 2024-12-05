@extends('layouts.main')

@section('title', 'Nouveautés')

@section('content')

    <h1 class="text-2xl font-bold text-center mb-10">Livres Récemment Ajoutés</h1>
<!-- Swiper Carousel -->
<div class="max-w-7xl mx-12 px-4 overflow-hidden">
    <div class="swiper-container h-auto">
        <div class="swiper-wrapper pb-10 text-accent-color">
            @foreach($recentBooks as $book)
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
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
@endsection