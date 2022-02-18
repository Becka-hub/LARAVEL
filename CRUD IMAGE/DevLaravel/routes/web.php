<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculesController;


Route::get('/',[VehiculesController::class,'index']);
Route::post('addVehicule',[VehiculesController::class,'add']);
Route::get('editVehicule/{id}',[VehiculesController::class,'edit']);
Route::put('updateVehicule/{id}',[VehiculesController::class,'updat']);
Route::delete('deleteVehicule/{id}',[VehiculesController::class,'delete']);

