<?php

use App\Models\stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\foireController;
use App\Http\Controllers\Api\standController;
use App\Http\Controllers\Api\evenementController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\UserUtilisateurController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [UserUtilisateurController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/logout', [UserUtilisateurController::class, 'logout']);});


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



Route::post('/foire',[foireController::class,'store']);
Route::get('/foire/{identifier}',[foireController::class,'show']);
Route::get('/foire',[foireController::class,'index']);
Route::put('/foire/{identifier}', [foireController::class,'update']);
Route::delete('/foire/{identifier}', [foireController::class,'destroy']);




