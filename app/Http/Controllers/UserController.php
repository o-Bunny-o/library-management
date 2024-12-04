<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Afficher le profil de l'utilisateur connecté.
     */
    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    /**
     * Mettre à jour le profil de l'utilisateur connecté.
     */
    public function update(Request $request)
    {
        // Valider les données envoyées
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'about' => 'nullable|string',
            
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Mise à jour des informations
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->about = $data['about'] ?? $user->about;

        // Mise à jour du mot de passe si fourni
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        // Sauvegarder les modifications
        $user->save();

        return redirect()->route('profile')->with('message', 'Profil mis à jour avec succès.');
    }

    /**
     * Créer un nouvel utilisateur avec un rôle fixe (admin seulement).
     */
    public function store(Request $request)
    {
        // Valider les données envoyées
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Avec confirmation du mot de passe
            'role' => 'nullable|string|in:user,admin', // Optionnel, validé uniquement par backend
        ]);
    
        // Vérifier si le rôle est défini dans la requête (uniquement admin peut définir un rôle)
        $role = 'user'; // Par défaut "user"
        if (isset($validated['role']) && Auth::user()->role === 'admin') {
            $role = $validated['role'];
        }
    
        // Créer un nouvel utilisateur
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $role, // Applique le rôle
        ]);
    
        // Rediriger avec un message de succès
        return redirect()->route('users.index')->with('message', 'Utilisateur créé avec succès.');
    }
    
}
