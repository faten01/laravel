<?php

namespace App\Http\Controllers;

use App\Models\UserUtilisateur;
use Illuminate\Http\Request;

class UserUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserUtilisateur::all();
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = UserUtilisateur::create($request->all());

    return response()->json($user, 201);
}

       
    
    

    /**
     * Display the specified resource.
     */
    public function show(UserUtilisateur $user,string $identifier)
    {
        
        $user = UserUtilisateur::where('Nom', $identifier)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        else{
    
        return response()->json($user);
        }
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
    public function update(Request $request, UserUtilisateur $user,string $identifier)

    {

         // Find the user by the given identifier
    $user = UserUtilisateur::where('Nom', $identifier)->first();

    // Check if the user exists
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Update specific attributes
    if ($request->has('Nom')) {
        $user->Nom = $request->input('Nom');
    }

    if ($request->has('Prenom')) {
        $user->Prenom = $request->input('Prenom');
    }

    // Update other attributes similarly

    // Save the changes
    $user->save();

    // Return the updated user
    return response()->json($user);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserUtilisateur $user,string $identifier)
    
    {
        $user = UserUtilisateur::where('Nom', $identifier)->first();

        $user->delete();

    return response()->json(null, 204);
    }
}
