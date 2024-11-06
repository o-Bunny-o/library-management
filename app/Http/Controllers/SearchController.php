<?php

namespace App\Http\Controllers;

use App\Models\Book; //Importe la classe Book
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query'); 
        $books = Book::where('title', 'like', '%' . $query . '%') //Recupere tous les livres qui contiennent le texte recherché dans le titre 
            ->orWhere('author', 'like', '%' . $query . '%')
            ->orWhere('year', 'like', '%' . $query . '%')
            ->get(); //Récupérer les livres qui contiennent le texte recherché dans le titre, l'auteur ou l'année
        return view('search.index', compact('books')); //Passer les livres à la vue 'books.index' qui affiche la liste des livres
    }
}

//Source :
//https://medium.com/@iqbal.ramadhani55/search-in-laravel-e0e20f329b01

 //$query = $request->query('query'); /*Récupérer  un paramètre query passé dans l'URL de la requête(lorsque l'utilisateur clique sur le bouton de recherche dans la page 'books.index' 
        //le browser envoie une requête HTTP avec le paramètre 'query'(qui est une clé) dans la requête qui va contenir le texte recherché) qui vas ressembler à ça
        //https://localhost:8000/search?query=2010 */
        