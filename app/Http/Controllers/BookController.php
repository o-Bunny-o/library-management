<?php


namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    //fonction pour recuperer tous les livres et ensuite les afficher dans la vue 'books.index'
    public function index()
    {
      
        $books = Book::all(); //Récupérer tous les livres
    
        return view('books.index', compact('books')); //Passer les livres à la vue 'books.index'
    }

    //fonction pour afficher la page de création d'un livre et ensuite la passer à la vue 'books.create' qui est une vue blade qui affiche le formulaire de création d'un livre
    public function create()
    {
        return view('books.create');
    }

    //fonction pour enregistrer un livre dans la base de données et ensuite la rediriger vers la page des livres
    public function store(Request $request)
    {
        // Valider les données envoyées par le formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string', 
            'price' => 'required|numeric',
        ]);
    
        // Si la validation passe, enregistrer le livre dans la base de données
        $book = new Book(); //Création d'un objet 'Book' qui sera enregistré dans la base de données
        $book->title = $validated['title']; 
        $book->author = $validated['author'];
        $book->year = $validated['year'];
        $book->description = $validated['description']; 
        $book->price = $validated['price'];
        $book->save();
    
        // Rediriger vers la page des livres
        return redirect()->route('books.index'); //Rediriger vers la vue 'books.index' qui affiche la liste des livres
    }
    
    // Fonction qui permet d'afficher les détails d'un livre grace à son id
    public function show($id)
    {
        $book = Book::find($id); //Récupérer le livre avec l'id passé en paramètre
        return view('books.show', compact('book')); //Passer le livre à la vue 'books.show' qui affiche les détails du livre
    }
    
    //fonction pour supprimer un livre d'une base de données et ensuite la rediriger vers la page des livres
    public function destroy($id)
    {
        $book = Book::find($id); //Récupérer le livre avec l'id passé en paramètre
        $book->delete(); // Supprimer le livre de la base de données
        return redirect()->route('books.index'); //Rediriger vers la vue 'books.index' qui affiche la liste des livres
    }

    //fonction pour afficher les nouveaux livres arrivés et ensuite les afficher dans la vue 'books.newArrivals'
    public function newArrivals()
    {
        $books = Book::where('year', '>', date('Y'))->get(); //Récupérer les livres ayant une année supérieure à l'année courante
        return view('books.newArrivals'); //Redirigerr vers la vue 'books.newArrivals' qui affiche les nouveaux livres arrivés
    }

}

//Inspiration
//https://medium.com/@santoshbusiness108/simple-laravel-crud-with-resource-controllers-95fb9f7ffab1