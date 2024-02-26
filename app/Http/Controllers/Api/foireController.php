<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\foire;
use Illuminate\Http\Request;

class foireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return foire::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $foire = foire::create($request->all());

        return response()->json($foire, 201);     }

    /**
     * Display the specified resource.
     */
    public function show(foire $foire,string $identifier)
    {
        $foire = foire::where('id', $identifier)->first();
        if (!$foire) {
            return response()->json(['error' => 'User not found'], 404);
        }
        else{
    
        return response()->json($foire);    }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,foire $foire,string $identifier)
    {
        $foire = foire::where('id', $identifier)->first();

        // Check if the user exists
        if (!$foire) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Update specific attributes
        if ($request->has('name	')) {
            $foire->name= $request->input('name	');
        }
    
        if ($request->has('email')) {
            $foire->email = $request->input('email');
        }

       

        if ($request->has('localisation')) {
            $foire->localisation = $request->input('localisation');
    
        }

        if ($request->has('numero')) {
            $foire->numero = $request->input('numero');
    
        }
    
        // Update other attributes similarly
    
        // Save the changes
        $foire->save();
    
        // Return the updated user
        return response()->json($foire);       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(foire $foire,string $identifier)
    {
        $foire = foire::where('id', $identifier)->first();

        $foire->delete();

    return response()->json("deleted successfuly", 204);    }
}
