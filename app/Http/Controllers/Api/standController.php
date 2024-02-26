<?php

namespace App\Http\Controllers\Api;

use App\Models\stand;
use Illuminate\Http\Request;
use App\Models\UserUtilisateur;
use App\Http\Controllers\Controller;

class standController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return stand::all();
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'user_id' => 'required|exists:user_utilisateurs,UserID',
                'description' => 'nullable|string|max:255',
                'number' => 'required|string|max:255',
                'surface' => 'required|numeric',
                'status_reservation' => 'required|in:free,reserved,occupied',
                // ... other validation rules
            ]);
    
            // Retrieve the corresponding user
            $user = UserUtilisateur::findOrFail($request->input('user_id'));
    
            // Create a new stand instance
            $stand = new Stand([
                'user_id' => $request->input('user_id'),
                'description' => $request->input('description'),
                'number' => $request->input('number'),
                'surface' => $request->input('surface'),
                'status_reservation' => $request->input('status_reservation'),
                // ... other fields
            ]);
    
            // Save the stand to the database
            $stand->save();
    
            // Return a response
            return response()->json($stand);
    
        } catch (\Exception $e) {
            // Log or handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(stand $stand,string $identifier)
    {
        $stand = stand::where('id', $identifier)->first();
        if (!$stand) {
            return response()->json(['error' => 'stand not found'], 404);
        }
        else{
    
        return response()->json($stand);
        }    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, stand $stand,string $identifier)
    {
        $stand = stand::where('id', $identifier)->first();

        // Check if the user exists
        if (!$stand) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Update specific attributes
        if ($request->has('number')) {
            $stand->number = $request->input('number');
        }
    
        if ($request->has('status_reservation')) {
            $stand->status_reservation = $request->input('status_reservation');
        }
    
        // Update other attributes similarly
    
        // Save the changes
        $stand->save();
    
        // Return the updated user
        return response()->json($stand);        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stand $stand,string $identifier)
    {
        $stand = stand::where('id', $identifier)->first();

        $stand->delete();

    return response()->json(null, 204);
    }    
}
