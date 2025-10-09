<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * @group Users
     * Lister les clients
     *
     * Retourne la liste des utilisateurs avec le rôle "client".
     * @authenticated
     * @response 200 {"component":"admin/client","props":{"clients":[{"id":1,"name":"Alice"}]}}
     */
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return Inertia::render('admin/client', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pas besoin car modal (voir modal)
    }

    /**
     * @group Users
     * Créer un nouvel utilisateur
     *
     * Crée un nouvel utilisateur avec nom, email et mot de passe.
     * @authenticated
     * @bodyParam name string required Nom complet de l’utilisateur. Example: Alice Martin
     * @bodyParam email string required Email unique. Example: alice@example.com
     * @bodyParam password string required Mot de passe. Example: secret123
     * @response 302 Redirection vers la liste des clients avec message de succès.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => 'string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        return to_route('client');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //<
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'current_password'      => ['required', 'current_password'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return back()->with('success', 'Mot de passe mis à jour.');
    }

    /**
     * @group Users
     * Supprimer un utilisateur
     *
     * Supprime un utilisateur par son ID.
     * @authenticated
     * @urlParam id integer required ID de l’utilisateur à supprimer. Example: 7
     * @response 302 Redirection avec message "Utilisateur supprimé avec succès."
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
