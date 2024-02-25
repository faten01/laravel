<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\stand;

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
        $stand = stand::create($request->all());

        return response()->json($stand, 201);
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
        if ($request->has('Number')) {
            $stand->Number = $request->input('Number');
        }
    
        if ($request->has('status_reservation')) {
            $stand->Status = $request->input('status_reservation');
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
