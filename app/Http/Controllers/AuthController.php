<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserUtilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
       /* $request->validate([
            'Nom' => 'required|string|max:250',
            'Prenom' => 'required|string|max:250',
            'Email' => 'required|email|max:250|unique:user_utilisateurs',
            'Telephone' => 'required|string|max:20',
            'Role' => 'required|string|max:50',
            'MotDePasse' => 'required|min:8|confirmed',
        ]);*/

        $user = UserUtilisateur::create([
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'Email' => $request->Email,
            'Telephone' => $request->Telephone,
            'Role' => $request->Role,
            'MotDePasse' => Hash::make($request->MotDePasse),
        ]);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token, 'message' => 'You have successfully registered & logged in!']);
    }

    public function login1(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'MotDePasse' => 'required',
        ]);

        if (!Auth::attempt(['Email' => $request->Email, 'MotDePasse' => $request->MotDePasse])) {
            throw ValidationException::withMessages([
                'Email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = $request->user();
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json(['token' => $token, 'message' => 'You have successfully logged in!']);
    }

    public function dashboard(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'user' => $user,
                'message' => 'Welcome to the dashboard, ' . $user->Nom . ' ' . $user->Prenom . '!',
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function login(Request $request)
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
    }


  
}
