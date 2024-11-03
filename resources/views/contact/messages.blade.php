<!-- INBOX -->

@extends('layouts.main')

@section('title', 'Messages Reçus')

@section('content')
<h1>Messages Reçus</h1>

@foreach($messages as $message)
    <div>
        <p><b>Nom:</b> {{ $message['name'] }}</p>
        <p><b>Email:</b> {{ $message['email'] }}</p>
        <p><b>Sujet:</b> {{ $message['subject'] }}</p>
        <p><b>Message:</b> {{ $message['message'] }}</p>
        <p><b>Reçu le:</b> {{ $message['created_at'] }}</p>
    </div>
@endforeach
@endsection