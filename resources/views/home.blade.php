@extends('layouts.main')

@section('content')
    <div class="about-us">
        <h2>About Us</h2>
        <p>Your "About Us" content goes here.</p>
    </div>

    <div class="book-carousel">
        <h2>Books Available for Purchase</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($books as $book)
                    <div class="swiper-slide">
                        <h3>{{ $book->title }}</h3>
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                        <p>{{ $book->description }}</p>
                        <!-- Add a purchase link or button -->
                    </div>
                @endforeach
            </div>
            <!-- Add Swiper navigation buttons if needed -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
@endsection
