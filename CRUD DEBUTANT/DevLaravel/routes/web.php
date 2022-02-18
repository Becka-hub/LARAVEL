<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

Route::get('/',function(){
    return view('pages/accueil');
})->name('app_home');
Route::get('/etudiant',[EtudiantController::class,"index"])->name('app_etudiant');
Route::get('/etudiant/create',[EtudiantController::class,"create"])->name('app_createEtudiant');
Route::post('/etudiant/create',[EtudiantController::class,"ajoute"])->name('app_ajouteEtudiant');
Route::delete('/etudiant/{etudiant}',[EtudiantController::class,"suprimer"])->name('app_supressionEtudiant');
Route::get('/etudiant/{etudiant}',[EtudiantController::class,"afficher"])->name('app_afficheEtudiant');
Route::put('/etudiant/{etudiant}',[EtudiantController::class,"modifier"])->name('app_editeEtudiant');
