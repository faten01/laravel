<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserUtilisateur;
use Illuminate\Support\Facades\Hash;

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

    /*public function login(Request $request)
    {
        $user= UserUtilisateur::where('Email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->MotDePasse, $user->MotDePasse)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }*/
    public function login(Request $request)
{
    $user = UserUtilisateur::where('Email', $request->Email)->first();

    if (!$user) {
        return response([
            'message' => ['User not found.']
        ], 404);
    }

    if (!Hash::check($request->MotDePasse, $user->MotDePasse)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 401);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
}

public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'You have logged out successfully!']);
    }    


}
