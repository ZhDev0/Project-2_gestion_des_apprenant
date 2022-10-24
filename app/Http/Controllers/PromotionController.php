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
    public function editPromotion($id) {
        $promo = DB::table('promotion')->where('id', $id)->first();
        return view('Edit_promotion', compact('promo'));
    }
    public function deletePromotion($id) {
        DB::table('promotion')->where('id', $id)->delete();
        return back()->with('promo_deleted','Promotion Has Been Deleted Successfully');
    }
    public function updatePromotion(Request $req, $id) {
        $validateData = $req->validate([
            'nom_promo' => 'required'
        ]);
        DB::table('promotion')->where('id', $id)->update([
            'Nom_promo' => $req->input('nom_promo')
        ]);
        return back()->with('promo_updated','Promotion Has Been Updated Successfully');
    }
}
