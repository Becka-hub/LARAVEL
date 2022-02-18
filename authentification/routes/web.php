<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantAuthController;
Route::get('/',function(){
  return view('page/home');
});

Route::get('/login',[EtudiantAuthController::class,"login"])->name('app_login')->middleware('AlreadyLoggedIn');

Route::get('/inscription',[EtudiantAuthController::class,"inscription"])->name('app_inscription')->middleware('AlreadyLoggedIn');

Route::post('/create',[EtudiantAuthController::class,"create"])->name('create');

Route::post('/check',[EtudiantAuthController::class,"check"])->name('check');

Route::get('/profile',[EtudiantAuthController::class,"profile"])->middleware('isLogged');

Route::get('/logout',[EtudiantAuthController::class,"logout"]);
