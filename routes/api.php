<?php

use App\Http\Controllers\UserUtilisateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users1', [UserUtilisateurController::class,'create']) ;
Route::post('/users',[UserUtilisateurController::class,'store']);
Route::get('/users/{identifier}',[UserUtilisateurController::class,'show']);
Route::get('/users',[UserUtilisateurController::class,'index']);
Route::put('/users/{identifier}', [UserUtilisateurController::class,'update']);
Route::delete('users/{identifier}', [UserUtilisateurController::class,'destroy']);






