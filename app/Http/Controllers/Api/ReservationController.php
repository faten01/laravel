<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return reservation::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = reservation::create($request->all());

        return response()->json($reservation, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation,string $identifier)
    {
        $reservation = reservation::where('ReservationID', $identifier)->first();
        if (!$reservation) {
            return response()->json(['error' => 'User not found'], 404);
        }
        else{
    
        return response()->json($reservation);
        }     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,reservation $reservation,string $identifier)
    {
        $reservation = reservation::where('ReservationID', $identifier)->first();

        // Check if the user exists
        if (!$reservation) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Update specific attributes
        if ($request->has('DateReservation	')) {
            $reservation->DateReservation	 = $request->input('DateReservation	');
        }
    
        if ($request->has('DateDebut')) {
            $reservation->DateDebut = $request->input('DateDebut');
        }

       

        if ($request->has('DateFin')) {
            $reservation->DateFin = $request->input('DateFin');
    
        }

        if ($request->has('Statut')) {
            $reservation->Statut = $request->input('Statut');
    
        }
    
        // Update other attributes similarly
    
        // Save the changes
        $reservation->save();
    
        // Return the updated user
        return response()->json($reservation);      }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation,string $identifier)
    {
        $reservation = reservation::where('ReservationID', $identifier)->first();

        $reservation->delete();

    return response()->json("deleted successfuly", 204);
    }
    
}
