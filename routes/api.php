<?php

use App\Http\Controllers\Api\evenementController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\standController;
use App\Http\Controllers\UserUtilisateurController;
use App\Models\stand;
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



Route::post('/stands',[standController::class,'store']);
Route::get('/stands/{identifier}',[standController::class,'show']);
Route::get('/stands',[StandController::class,'index']);
Route::put('/stands/{identifier}', [standController::class,'update']);
Route::delete('/stands/{identifier}', [StandController::class,'destroy']);


Route::post('/evenements',[evenementController::class,'store']);
Route::get('/evenements/{identifier}',[evenementController::class,'show']);
Route::get('/evenements',[evenementController::class,'index']);
Route::put('/evenements/{identifier}', [evenementController::class,'update']);
Route::delete('/evenements/{identifier}', [evenementController::class,'destroy']);


Route::post('/reservations',[ReservationController::class,'store']);
Route::get('/reservations/{identifier}',[ReservationController::class,'show']);
Route::get('/reservations',[ReservationController::class,'index']);
Route::put('/reservations/{identifier}', [ReservationController::class,'update']);
Route::delete('/reservations/{identifier}', [ReservationController::class,'destroy']);




