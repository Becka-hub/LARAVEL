<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\RepasController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ajouteRepas',[RepasController::class,"ajouteRepas"]);
Route::get('/repas',[RepasController::class,'afficheRepas']);
Route::get('/unRepas/{id}',[RepasController::class,'afficheUnRepas']);
Route::put('/modifierRepas/{id}',[RepasController::class,'modifierRepas']);
Route::delete('/suprimerRepas/{id}',[RepasController::class,'suprimerRepas']);
