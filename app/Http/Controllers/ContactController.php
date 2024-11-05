<?php

namespace App\Http\Controllers;

use App\Models\Message; //Importe la classe Message
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //fonction pour afficher les messages et ensuite les afficher dans la vue 'contact.index'
    public function index()
    {
        $messages = Message::all(); //Recupère tout les messages enregistré dans la base de données
        return view('contact.index', compact('messages')); //compact permet de passer les variables à la vue 'contact.index' cela vas creer un tableau qui va contenir tous les messages
    }


    //fonction pour afficher la page de création d'un message et ensuite la passer à la vue 'contact.create' qui est une vue blade qui affiche le formulaire de création d'un message
    public function create()
    {
        return view('contact.create');
    }


 // fonction pour enregistrer un message dans la base de données et ensuite la rediriger vers la page des messages
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', // Permet a l'utilisateur d'envoyer plusieurs messages avec le même email
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Création du message avec les données validées
        Message::create($validated);
    
        // Rediriger vers l'index des messages
        return redirect()->route('contact.index');
    }
    

  // Affiche la liste des messages
  public function showMessages()
  {
      // Récupérer les messages de la base de données
      $messages = Message::all();
      // Passer les messages à la vue pour les afficher
      return view('contact.messages', compact('messages'));  // Affiche tous les messages envoyés
  }
}