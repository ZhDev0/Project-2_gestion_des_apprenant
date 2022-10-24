<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprenantController extends Controller
{
    public function index()
    {
        return view('Ajouter_apprenant');
    }

    public function ajouterapprenantsumbit(Request $req)
    {

        $ValidateData = $req->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required | email'
        ]);

        DB::table('apprenant')->insert([
            'Prenom' => $req->prenom,
            'Nom' => $req->nom,
            'email' => $req->email
        ]);
        return back()->with('apprenant_created', 'Apprenant Has Been Created SuccessFully !!');
    }
    public function getAllApprenant()
    {
        $apprenant = DB::table('apprenant')->get();
        return view('gestion_apprenant', compact('apprenant'));
    }
    public function editApprenant($id)
    {
        $apprenant = DB::table('apprenant')->where('id', $id)->first();
        return view('Edit_apprenant', compact('apprenant'));
    }
}
