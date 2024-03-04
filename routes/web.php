<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\foireController;
use App\Http\Controllers\Api\standController;
use App\Http\Controllers\Api\evenementController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\UserUtilisateurController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('user_utilisateurs', UserUtilisateurController::class)->only(['create', 'store']);

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








