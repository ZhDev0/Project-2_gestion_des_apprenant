<?php

use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\PromotionController;
use App\Models\Apprenant;
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
Route::get('/edit_promotion/{id}', [PromotionController::class, 'editPromotion'])->name('promo.edit');
Route::get('/delete_promotion/{id}', [PromotionController::class, 'deletePromotion'])->name('promo.delete');
Route::post('/edit_promotion/{id}', [PromotionController::class, 'updatePromotion'])->name('promo.update');
Route::get('search', [PromotionController::class, 'search'])->name('promo.search');
Route::get('/gestion_apprenant', [ApprenantController::class, 'getAllApprenant'])->name('apprenant.get');
Route::get('/edit_apprenant/{id}', [ApprenantController::class, 'editApprenant'])->name('apprenant.edit');
// Route::get('/gestion_apprenant/{id}', [PromotionController::class, 'getIdPromo'])->name('apprenant.getid');
Route::post('/edit_apprenant/{id}', [ApprenantController::class, 'updateApprenant'])->name('apprenant.update');
Route::get('searcha', [ApprenantController::class, 'searcha'])->name('apprenant.search');
Route::get('/delete_apprenant/{id}', [ApprenantController::class, 'deleteApprenant'])->name('apprenant.delete');
