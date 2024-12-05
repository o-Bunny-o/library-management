@extends('layouts.main')

@section('title', 'Messages Reçus')

@section('content')
<h1 class="text-2xl font-bold text-center mb-6">Messages Reçus</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

@if($messages->isEmpty())
    <p>Aucun message à afficher.</p>
@else
    @foreach($messages as $message)
        <div class="message border p-4 mb-4 rounded shadow">
            <p><strong>Nom:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Sujet:</strong> {{ $message->subject }}</p>
            <p><strong>Message:</strong> {{ $message->message }}</p>
            <p><strong>Reçu le:</strong> {{ $message->created_at }}</p>
            <p><strong>Statut:</strong> {{ $message->is_read ? 'Lu' : 'Non Lu' }}</p>

            {{-- Only show action buttons to admins --}}
            @if(auth()->check() && auth()->user()->role === 'admin')
                {{-- Mark as Read --}}
                <form action="{{ route('messages.markRead', $message->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mark as Read</button>
                </form>

                {{-- Mark as Unread --}}
                <form action="{{ route('messages.markUnread', $message->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Mark as Unread</button>
                </form>

                {{-- Delete --}}
                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            @endif
        </div>
    @endforeach
@endif
@endsection
