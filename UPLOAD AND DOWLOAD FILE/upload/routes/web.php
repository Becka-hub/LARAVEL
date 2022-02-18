<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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
Route::post('uploadproduct',[PageController::class,"store"])->name('app_store');
Route::get('viewproduct',[PageController::class,"show"])->name('app_view');
Route::get('/download/{file}',[PageController::class,"download"])->name('app_download');
Route::get('/view/{id}',[PageController::class,"view"])->name('app_show');
