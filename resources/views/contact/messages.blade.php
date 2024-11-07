<!-- INBOX -->

@extends('layouts.main')

@section('title', 'Messages Reçus')

@section('content')
    <h1 class="text-2xl font-bold text-center mb-6">Messages Reçus</h1>
    <div class="form-container">

    @foreach($messages as $message)
        <div class="message">
            <p><strong>Nom:</strong> {{ $message['name'] }}</p>
            <p><strong>Email:</strong> {{ $message['email'] }}</p>
            <p><strong>Sujet:</strong> {{ $message['subject'] }}</p>
            <p><strong>Message:</strong> {{ $message['message'] }}</p>
            <p><strong>Reçu le:</strong> {{ $message['created_at'] }}</p>
            <hr>
        </div>
    @endforeach
</div>
@endsection
