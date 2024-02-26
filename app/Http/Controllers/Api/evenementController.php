<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\evenement;
use Illuminate\Http\Request;

class evenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return evenement::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $evenement = evenement::create($request->all());

        return response()->json($evenement, 201);    }

    /**
     * Display the specified resource.
     */
    public function show(evenement $evenement,string $identifier)
    {
        $evenement = evenement::where('EvenementID', $identifier)->first();
        if (!$evenement) {
            return response()->json(['error' => 'User not found'], 404);
        }
        else{
    
        return response()->json($evenement);
        }    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, evenement $evenement,string $identifier)
    {
        $evenement = evenement::where('EvenementID', $identifier)->first();

        // Check if the user exists
        if (!$evenement) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Update specific attributes
        if ($request->has('Nom')) {
            $evenement->Nom = $request->input('Nom');
        }
    
        if ($request->has('Description')) {
            $evenement->Description = $request->input('Description');
        }

        if ($request->has('DateDebut')) {
            $evenement->DateDebut = $request->input('DateDebut');
    
        }

        if ($request->has('DateFin')) {
            $evenement->DateFin = $request->input('DateFin');
    
        }
    
        // Update other attributes similarly
    
        // Save the changes
        $evenement->save();
    
        // Return the updated user
        return response()->json($evenement);     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(evenement $evenement,string $identifier)
    {
        $evenement = evenement::where('EvenementID', $identifier)->first();

        $evenement->delete();

    return response()->json(null, 204);
    }
}
