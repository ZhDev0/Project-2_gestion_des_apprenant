<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprenantController extends Controller
{
    public function index() {
        return view('Ajouter_apprenant');
    }

    public function ajouterapprenantsumbit(Request $req) {
        DB::table('apprenant')->insert([
            'Prenom' => $req->prenom ,
            'Nom' => $req->nom,
            'email' => $req->email
        ]);
        return back()->with('apprenant_created', 'Apprenant Has Been Created SuccessFully !!');
    }
}
