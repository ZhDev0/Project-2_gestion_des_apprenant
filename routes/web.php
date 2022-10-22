<?php

use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/Ajouter_apprenant', function () {
    return view('Ajouter_apprenant');
});

Route::get('/Ajouter_promotion', [PromotionController::class, 'index'])->name('promo.index');
Route::get('/Ajouter_apprenant', [ApprenantController::class, 'index'])->name('apprenant.index');
Route::post('/Ajouter_promotion', [PromotionController::class, 'ajouterpromosumbit'])->name('promo.ajouter');
Route::post('/Ajouter_apprenant', [ApprenantController::class, 'ajouterapprenantsumbit'])->name('apprenant.ajouter');
Route::get('/gestion_promotion', [PromotionController::class, 'getAllPromotion'])->name('promo.get');
