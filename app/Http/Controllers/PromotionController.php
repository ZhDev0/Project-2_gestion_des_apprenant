<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index() {
        return view('Ajouter_promotion');
    }
    public function ajouterpromosumbit(Request $req) {
        $validateData = $req->validate([
            'nom_promo' => 'required'
        ]);
        DB::table('promotion')->insert([
            'Nom_promo' => $req->nom_promo
        ]);
        return back()->with('promo_created', 'Promotion Has Been Created SuccessFully !!');
    }
    public function getAllPromotion() {
        $promos = DB::table('promotion')->get();
        return view('gestion_promotion', compact('promos'));
    }
}
