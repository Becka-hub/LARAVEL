<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculesController;

Route::get('/', function () {
    return view('pages/home');
});
Route::get('/liste',[VehiculesController::class,'index'])->name('app_listeVehicule');
Route::post('addVehicule',[VehiculesController::class,'add'])->name('app_addVehicule');
Route::get('editVehicule/{id}',[VehiculesController::class,'edit'])->name('app_getVehicule');
Route::post('updateVehicule/{id}',[VehiculesController::class,'updat'])->name('app_updateVehicule');
Route::get('deleteVehicule/{id}',[VehiculesController::class,"delete"])->name('app_deleteVehicule');
