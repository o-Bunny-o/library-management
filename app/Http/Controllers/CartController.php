<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->check()
            ? CartItem::where('user_id', auth()->id())->with('book')->get()
            : CartItem::where('session_id', session()->getId())->with('book')->get();
    
        // Calcul du total général (avant taxes)
        $subtotal = $cartItems->sum(fn($item) => $item->quantity * $item->price);
    
        // Taux de taxes
        $tpsRate = 0.05; // TPS
        $tvqRate = 0.09975; // TVQ
    
        // Calcul des taxes
        $tps = $subtotal * $tpsRate;
        $tvq = $subtotal * $tvqRate;
        $total = $subtotal + $tps + $tvq;
    
        return view('cart.index', compact('cartItems', 'subtotal', 'tps', 'tvq', 'total'));
    }
    
    public function store(Request $request)
    {
        $book = Book::findOrFail($request->input('book_id'));
        $quantity = $request->input('quantity', 1);

        if ($quantity > $book->stock) {
            return redirect()->back()->withErrors([
                'stock' => "Quantité demandée supérieure au stock disponible. Stock actuel : {$book->stock}",
            ]);
        }

        $data = [
            'quantity' => $quantity,
            'price' => $book->price,
        ];

        if (auth()->check()) {
            CartItem::updateOrCreate(['user_id' => auth()->id(), 'book_id' => $book->id], $data);
        } else {
            CartItem::updateOrCreate(['session_id' => session()->getId(), 'book_id' => $book->id], $data);
        }

        return redirect()->route('cart.index')->with('success', 'Article ajouté au panier.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);
    
        $cartItem = CartItem::findOrFail($id);
        $book = $cartItem->book; // Récupère les informations du livre associé
    
        // Vérification du stock
        if ($request->quantity > $book->stock) {
            return back()->withErrors([
                'stock' => "Quantité demandée supérieure au stock disponible. Stock actuel : {$book->stock}.",
            ]);
        }
    
        // Mise à jour de la quantité
        $cartItem->update(['quantity' => $request->quantity]);
    
        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour avec succès !');
    }
    

    public function destroy($id)
    {
        CartItem::destroy($id);
        return redirect()->route('cart.index')->with('success', 'Article supprimé avec succès !');
    }

    public function mergeCarts()
    {
        if (!auth()->check()) return;

        $sessionId = session()->getId();
        $cartItems = CartItem::where('session_id', $sessionId)->get();

        foreach ($cartItems as $item) {
            CartItem::updateOrCreate(
                ['user_id' => auth()->id(), 'book_id' => $item->book_id],
                ['quantity' => $item->quantity, 'price' => $item->price]
            );
        }

        CartItem::where('session_id', $sessionId)->delete();
    }
}
