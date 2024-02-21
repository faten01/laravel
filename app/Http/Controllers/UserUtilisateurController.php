<?php

namespace App\Http\Controllers;

use App\Models\UserUtilisateur;
use Illuminate\Http\Request;
use App\UserUtilisateurs;

class UserUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_utilisateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Email' => 'required',
            'Telephone' => 'required',
            'Role' => 'required|in:Exposant,Visiteur,Admin',
            'MotDePasse' => 'required',
            // Add other validation rules as needed
        ]);

        // Create a new user
        $user = new UserUtilisateur([
            'Nom' => $request->input('Nom'),
            'Prenom' => $request->input('Prenom'),
            'Email' => $request->input('Email'),
            'Telephone' => $request->input('Telephone'),
            'Role' => $request->input('Role'),
            'MotDePasse' => bcrypt($request->input('MotDePasse')), // Hash the password
   
        ]);

        $user->save();
        return redirect('/UserUtilisateurs')->with('success', 'User saved!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
