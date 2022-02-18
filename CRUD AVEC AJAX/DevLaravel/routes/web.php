<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/home');
});
Route::get('/vehicule/affiche',[VehiculeController::class,"listeVehicule"])->name('app_listeVehicule');
Route::get('/vehicule/delete/{id}',[VehiculeController::class,"deleteVehicule"])->name('app_deleteVehicule');
Route::post('/vehicule/ajoute',[VehiculeController::class,"ajouteVehicule"])->name('app_ajouteVehicule');
Route::get('/vehicule/getVehicule/{id}',[VehiculeController::class,"recupereVehicule"])->name('app_recupereVehicule');
Route::post('/vehicule/modifier/{id}',[VehiculeController::class,"modifierVehicule"])->name('app_modifierVehicule');
