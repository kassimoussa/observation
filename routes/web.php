<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FicheController; 

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

/* Route::get('/', function () {
    return view('connexion');
}); */

Route::get('/',  [UserController::class, 'accueil']);

Route::post('check', [UserController::class, 'check'])->name('check');
Route::post('store', [UserController::class, 'store'])->name('store');


 
Route::group(['middleware' => ['logged']], function () {
    Route::get('index',  [FicheController::class, 'index']); 
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('change_infos/{user}', [UserController::class, 'change_infos']);
    Route::put('change_pass/{user}', [UserController::class, 'change_pass']);

    Route::prefix('fiches')->group(function () {
        Route::get('/create', [FicheController::class, 'create']);
        Route::post('/store', [FicheController::class, 'store']);
        Route::get('/show/{fiche}', [FicheController::class, 'show']);
        Route::get('/edit/{fiche}', [FicheController::class, 'edit']);
        Route::put('/update/{fiche}', [FicheController::class, 'update']);
        Route::put('/update_nv2/{fiche}', [FicheController::class, 'update_nv2']);
        Route::put('/update_nv3/{fiche}', [FicheController::class, 'update_nv3']);
        Route::put('/transmettre/{fiche}', [FicheController::class, 'transmettre']);
        Route::delete('/delete/{fiche}', [FicheController::class, 'destroy']);
        Route::get('/new-fiches-list', [FicheController::class, 'new_fiches']);
        Route::get('/nv2-fiches-list', [FicheController::class, 'nv2_fiches']);
        Route::get('/nv3-fiches-list', [FicheController::class, 'nv3_fiches']);
        Route::get('/dc-fiches-list', [FicheController::class, 'dc_fiches']);
    });

    Route::get('voirfiche/{id}', [FicheController::class, 'voir']);
    //Route::get('newfiche', [FicheController::class, 'create']);
    //Route::post('store', [FicheController::class, 'store']);
    Route::get('edit/{fiche}', [FicheController::class, 'edit']);
    Route::put('update/{fiche}', [FicheController::class, 'update']);
    Route::delete('delete_fiche/{fiche}', [FicheController::class, 'destroy']);
    Route::get('fiche_pdf/{fiche}', [FicheController::class, 'pdf']);
    Route::get('dash',  [UserController::class, 'dash']);
    Route::post('add_document', [DocumentController::class, 'store'])->name('add_document');
    Route::get('download/{document}', [DocumentController::class, 'download']);
    Route::delete('delete_document/{document}', [DocumentController::class, 'destroy']);
    Route::get('stats', [FicheController::class, 'stats']);

});
 
